<?php

namespace App\Command;

use App\Service\ApiService;
use App\Service\RankService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\Response;

class CalculateRankCommand extends Command
{
    protected static $defaultName = 'app:calculate-rank';

    private $apiService;

    private $rankService;

    public function __construct(ApiService $apiService, RankService $rankService)
    {
        $this->apiService = $apiService;
        $this->rankService = $rankService;
        parent::__construct();
    }

    protected function configure()
    {
        $this
          ->setDescription('Calculate rank by using external api.');

        $this->addOption('url',  null, InputOption::VALUE_REQUIRED, 'External api url');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $io->title('Fetching data from external resource...');
            $data = $this->fetchData($input->getOption('url'));
            $io->success('Data fetched');
            $io->title('Data processing...');
            $results = $this->rankService->buildRating($data);
            $io->success('Data processed');
            $io->title('Results');
            $io->table([
                'rank', 'team', 'scores'
            ], $results);

        } catch (\Throwable $exception) {
            $io->error($exception->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function fetchData(string $url): array
    {
        $response = $this->apiService->get($url);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new \Exception(
                \sprintf(
                    '%d invalid response status code',
                    $response->getStatusCode()
                )
            );
        }

        if (!$response->getHeaders()['content-type'] || $response->getHeaders()['content-type'][0] !== 'application/json') {
            throw new \Exception(
                \sprintf(
                    'Invalid content-type, support only %s',
                    'application/json'
                )
            );
        }

        $content = \json_decode($response->getContent(), true);

        if (!$content || !is_array($content)) {
            throw new \Exception('invalid external data must be valid json');
        }

        return $content;
    }
}

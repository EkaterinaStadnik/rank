<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiService
{
    public function get(string $url): ResponseInterface
    {
        $client = HttpClient::create();

        return $client->request('GET', $url);
    }
}

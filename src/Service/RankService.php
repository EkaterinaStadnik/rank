<?php

namespace App\Service;

class RankService
{
    public function buildRating(array $data): array
    {
        $sortingData = $this->sort($data);

        return $this->assignRank($sortingData);
    }

    private function sort(array $data): array
    {
        $result = [];
        foreach ($data as $value) {
            if (!isset($value['scores']) || empty($value['team'])) {
                throw new \Exception('Data is not correct');
            }
            $result[(int)$value['scores']][] = $value;
        }

        return $result;
    }

    private function assignRank(array $data): array
    {
        \krsort($data);
        $rank = 1;
        $result = [];
        foreach ($data as $item) {
            $currentRank = $rank;
            foreach ($item as $value) {
                $value = ['rank' => $currentRank] + $value;
                $rank++;
                $result[] = $value;
            }
        }

            return $result;
    }
}

<?php

namespace App\Controller;

use App\Service\DataService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    /**
     * @Route("/test", methods={"GET"})
     */
    public function test(DataService $dataService)
    {
         return new JsonResponse($dataService->getData());
    }
}

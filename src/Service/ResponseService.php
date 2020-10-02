<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseService
{
    public function json(array $data): JsonResponse
    {
        $response = new JsonResponse();
        $response->setData($data);

        return $response;
    }
}

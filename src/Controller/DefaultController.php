<?php

namespace App\Controller;

use App\Service\ResponseService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(ResponseService $responseService): Response
    {
        $request = Request::createFromGlobals();

        return $responseService->json([
            'request' => $request->query->get('hello')
        ]);
    }
}

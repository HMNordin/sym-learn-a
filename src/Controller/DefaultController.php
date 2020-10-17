<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('welcome.html.twig', [
            'products' => $productRepository->findByTitleField('Test')
        ]);
    }

    public function show(ProductRepository $productRepository)
    {
        return $this->render('home.html.twig', [
            'products' => $productRepository->findByTitleField('Test')
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\ProductRepository;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(ResponseService $responseService, ProductRepository $productRepository): Response
    {
        $request = Request::createFromGlobals();

        $manager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setName('test');
        $manager->persist($user);
        $manager->flush();

        $product = new Product();
        $product->setTitle('Test');
        $product->setUser($user);
        $manager->persist($product);
        $manager->flush();

        return $responseService->json([
            'request' => $request->query->get('hello'),
            'products' => $productRepository->findAll(),
            'findBy' => $productRepository->findByTitleField('Test')
        ]);
    }

    public function show(ProductRepository $productRepository)
    {
        return $this->render('home.html.twig', [
            'products' => $productRepository->findByTitleField('Test')
        ]);
    }
}

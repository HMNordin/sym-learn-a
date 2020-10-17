<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class DefaultController extends AbstractController
{
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('welcome.html.twig', [
            'products' => $productRepository->findByTitleField('Test')
        ]);
    }

    public function store(Request $request): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $manager = $this->getDoctrine()->getManager();
        $form = $request::createFromGlobals();

        $product = new Product();
        $product->setUser($user);
        $product->setTitle($form->request->get('title'));
        $manager->persist($product);
        $manager->flush();

        return $this->redirectToRoute('home');
    }

    public function show(ProductRepository $productRepository)
    {
        return $this->render('home.html.twig', [
            'products' => $productRepository->findByTitleField('Test')
        ]);
    }
}

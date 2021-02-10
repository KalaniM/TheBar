<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/bar", name="bar")
     */
    public function index(): Response
    {
        return $this->render('bar/index.html.twig', [
            'page_title' => 'The bar',
            'cards_title' => 'Special title treatment',
            'cards_infos' => 'With supporting text below as a natural lead-in to additional content.'
        ]);
    }
    /**
     * @Route("/mention", name="mention")
     */
    public function mention()
    {
        return $this->render('bar/mention.html.twig', [
            'page_title' => 'Mentions légales',
            'cards_title' => 'Mentions',
            'cards_infos' => 'With supporting text below as a natural lead-in to additional content? '
        ]);
    }
}
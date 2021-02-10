<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class BarController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

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

        dump($this->beers_api());

        return $this->render('bar/mention.html.twig', [
            'page_title' => 'Mentions légales',
            'cards_title' => 'Mentions',
            'cards_infos' => 'With supporting text below as a natural lead-in to additional content? '
        ]);
    }

    private function beers_api(): array
    {
        $response = $this->client->request(
            'GET',
            'https://raw.githubusercontent.com/Antoine07/hetic_symfony/main/Introduction/Data/beers.json'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}
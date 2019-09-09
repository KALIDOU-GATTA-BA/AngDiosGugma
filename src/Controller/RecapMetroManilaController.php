<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MetroManila;

class RecapMetroManilaController extends AbstractController
{
    /**
     * @Route("/recap/metro/manila", name="recap_metro_manila")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(MetroManila::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_metro_manila/index.html.twig', [
            'articles' => $articles,
            ]);
    }
}

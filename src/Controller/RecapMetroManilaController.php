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
        $articles1=$articles[0];
        $articles2=$articles[1];
        $articles3=$articles[2];
        $articles4=$articles[3];
        $articles5=$articles[4];
        $articles6=$articles[5];

        return $this->render('recap_metro_manila/index.html.twig', [
            'article1' => $articles1,
            'article2' => $articles2,
            'article3' => $articles3,
            'article4' => $articles4,
            'article5' => $articles5,
            'article6' => $articles6,
            
        ]);  
    }
}

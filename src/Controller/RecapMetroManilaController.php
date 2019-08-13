<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecapMetroManilaController extends AbstractController
{
    /**
     * @Route("/recap/metro/manila", name="recap_metro_manila")
     */
    public function index()
    {
        return $this->render('recap_metro_manila/index.html.twig', [
            'controller_name' => 'RecapMetroManilaController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LiturgyController extends AbstractController
{
    /**
     * @Route("/liturgy", name="liturgy")
     */
    public function index()
    {
        return $this->render('liturgy/index.html.twig', [
            'controller_name' => 'LiturgyController',
        ]);
    }
}

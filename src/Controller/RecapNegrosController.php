<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecapNegrosController extends AbstractController
{
    /**
     * @Route("/recap/negros", name="recap_negros")
     */
    public function index()
    {
        return $this->render('recap_negros/index.html.twig', [
            'controller_name' => 'RecapNegrosController',
        ]);
    }
}

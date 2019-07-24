<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CooperativeController extends AbstractController
{
    /**
     * @Route("/cooperative", name="cooperative")
     */
    public function index()
    {
        return $this->render('cooperative/index.html.twig', [
            'controller_name' => 'CooperativeController',
        ]);
    }
}

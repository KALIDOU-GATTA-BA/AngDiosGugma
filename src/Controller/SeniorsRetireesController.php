<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SeniorsRetireesController extends AbstractController
{
    /**
     * @Route("/seniors/retirees", name="seniors_retirees")
     */
    public function index()
    {
        return $this->render('seniors_retirees/index.html.twig', [
            'controller_name' => 'SeniorsRetireesController',
        ]);
    }
}

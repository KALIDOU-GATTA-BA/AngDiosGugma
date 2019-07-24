<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PathController extends AbstractController
{
    /**
     * @Route("/path", name="path")
     */
    public function index()
    {
        return $this->render('path/index.html.twig', [
            'controller_name' => 'PathController',
        ]);
    }
}

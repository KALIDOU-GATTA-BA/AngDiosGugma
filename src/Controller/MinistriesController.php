<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MinistriesController extends AbstractController
{
    /**
     * @Route("/ministries", name="ministries")
     */
    public function index()
    {
        return $this->render('ministries/index.html.twig', [
            'controller_name' => 'MinistriesController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecapInternationalController extends AbstractController
{
    /**
     * @Route("/recap/international", name="recap_international")
     */
    public function index()
    {
        return $this->render('recap_international/index.html.twig', [
            'controller_name' => 'RecapInternationalController',
        ]);
    }
}

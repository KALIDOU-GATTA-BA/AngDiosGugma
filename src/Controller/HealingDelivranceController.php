<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HealingDelivranceController extends AbstractController
{
    /**
     * @Route("/healing/delivrance", name="healing_delivrance")
     */
    public function index()
    {
        return $this->render('healing_delivrance/index.html.twig', [
            'controller_name' => 'HealingDelivranceController',
        ]);
    }
}

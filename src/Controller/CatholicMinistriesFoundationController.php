<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CatholicMinistriesFoundationController extends AbstractController
{
    /**
     * @Route("/catholic/ministries/foundation", name="catholic_ministries_foundation")
     */
    public function index()
    {
        return $this->render('catholic_ministries_foundation/index.html.twig', [
            'controller_name' => 'CatholicMinistriesFoundationController',
        ]);
    }
}

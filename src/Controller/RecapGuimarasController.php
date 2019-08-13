<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecapGuimarasController extends AbstractController
{
    /**
     * @Route("/recap/guimaras", name="recap_guimaras")
     */
    public function index()
    {
        return $this->render('recap_guimaras/index.html.twig', [
            'controller_name' => 'RecapGuimarasController',
        ]);
    }
}

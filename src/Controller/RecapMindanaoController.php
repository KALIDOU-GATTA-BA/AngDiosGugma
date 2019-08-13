<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecapMindanaoController extends AbstractController
{
    /**
     * @Route("/recap/mindanao", name="recap_mindanao")
     */
    public function index()
    {
        return $this->render('recap_mindanao/index.html.twig', [
            'controller_name' => 'RecapMindanaoController',
        ]);
    }
}

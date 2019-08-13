<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DevCooperativeController extends AbstractController
{
    /**
     * @Route("/dev/cooperative", name="dev_cooperative")
     */
    public function index()
    {
        return $this->render('dev_cooperative/index.html.twig', [
            'controller_name' => 'DevCooperativeController',
        ]);
    }
}

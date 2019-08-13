<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class YouthWarriorsController extends AbstractController
{
    /**
     * @Route("/youth/warriors", name="youth_warriors")
     */
    public function index()
    {
        return $this->render('youth_warriors/index.html.twig', [
            'controller_name' => 'YouthWarriorsController',
        ]);
    }
}

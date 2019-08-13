<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SupportMinistriesController extends AbstractController
{
    /**
     * @Route("/support/ministry", name="support_ministries")
     */
    public function index()
    {
        return $this->render('support_ministry/index.html.twig', [
            'controller_name' => 'SupportMinistryController',
        ]);
    }
}

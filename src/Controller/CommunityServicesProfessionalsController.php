<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommunityServicesProfessionalsController extends AbstractController
{
    /**
     * @Route("/community/services/professionals", name="community_services_professionals")
     */
    public function index()
    {
        return $this->render('community_services_professionals/index.html.twig', [
            'controller_name' => 'CommunityServicesProfessionalsController',
        ]);
    }
}

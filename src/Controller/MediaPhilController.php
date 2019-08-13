<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MediaPhilController extends AbstractController
{
    /**
     * @Route("/media/phil", name="media_phil")
     */
    public function index()
    {
        return $this->render('media_phil/index.html.twig', [
            'controller_name' => 'MediaPhilController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MusicMinistryController extends AbstractController
{
    /**
     * @Route("/music/ministry", name="music_ministry")
     */
    public function index()
    {
        return $this->render('music_ministry/index.html.twig', [
            'controller_name' => 'MusicMinistryController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LittleJuniorServantsController extends AbstractController
{
    /**
     * @Route("/little/junior/servants", name="little_junior_servants")
     */
    public function index()
    {
        return $this->render('little_junior_servants/index.html.twig', [
            'controller_name' => 'LittleJuniorServantsController',
        ]);
    }
}

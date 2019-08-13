<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditComIncController extends AbstractController
{
    /**
     * @Route("/edit/com/inc", name="edit_com_inc")
     */
    public function index()
    {
        return $this->render('edit_com_inc/index.html.twig', [
            'controller_name' => 'EditComIncController',
        ]);
    }
}

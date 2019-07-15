<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NotFoundStudentController extends AbstractController
{
    /**
     * @Route("/not/found/student", name="not_found_student")
     */
    public function index()
    {
        return $this->render('not_found_student/index.html.twig', [
            'controller_name' => 'NotFoundStudentController',
        ]);
    }
}

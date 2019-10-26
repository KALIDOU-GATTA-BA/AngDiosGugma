<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CheckConnectionManager;

class NotFoundStudentController extends AbstractController
{
    /**
     * @Route("/not/found/student", name="not_found_student")
     */
    public function index(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        if (!$cnm->roleTeacher()) {
            return $this->redirectToRoute('error_teacher');
        }
        return $this->render('not_found_student/index.html.twig', [
            'controller_name' => 'NotFoundStudentController',
        ]);
    }
}

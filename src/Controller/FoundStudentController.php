<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\StudentsManager;


class FoundStudentController extends AbstractController
{
    /**
     * @Route("/found/student", name="found_student")
     */

    public function index(StudentsManager $sm)
    {        
    	 $fn=$sm->getAllStudentData()[0];
    	 $ln=$sm->getAllStudentData()[1];
    	 $city=$sm->getAllStudentData()[2];
    	 $level=$sm->getAllStudentData()[3];
    	 $birthDate=$sm->getAllStudentData()[4];

        return $this->render('found_student/index.html.twig', [
            'fn' => $fn,
            'ln' => $ln,
            'city' => $city,
            'level' => $level,
            'birthDate' => $birthDate,
        ]);
    }
}

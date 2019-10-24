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
        return $this->render('found_student/index.html.twig', [
            'age'=>$sm->getAllStudentData()[0]->getAge(),
            'representative'=>$sm->getAllStudentData()[0]->getRepresentative(),
            'grade'=>$sm->getAllStudentData()[0]->getGrade(),
            'status'=>$sm->getAllStudentData()[0]->getStatus(),
            'ADGWorkerOrIndigent'=>$sm->getAllStudentData()[0]->getADGWorkerOrIndigent(),
            'Address'=>$sm->getAllStudentData()[0]->getAddress(),
            'lastName'=>$sm->getAllStudentData()[0]->getLastName(),
            'firstName'=>$sm->getAllStudentData()[0]->getFirstName(),
            'birthDate'=>$sm->getAllStudentData()[0]->getBirthDate(),
            'contactNumber'=>$sm->getAllStudentData()[0]->getContactNumber(),
        ]);
    }
}

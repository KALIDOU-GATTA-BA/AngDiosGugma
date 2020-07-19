<?php

namespace App\Controller;

use App\Form\StudentAddType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\StudentAddRepository;
use App\Handlers\Form\StudentAddFormHandler;
use App\Services\CheckConnectionManager;

class StudentAddController extends AbstractController
{
    private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(StudentAddFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/student/add", name="student_add")
     */
    public function studentAdd(Request $request, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        if (!$cnm->roleTeacher()) {
            return $this->redirectToRoute('error_teacher');
        }
        $form = $this->createForm(StudentAddType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('student_suc');
        }
        return $this->render('student_add/index.html.twig', [
                           'student_add' => $form->createView(),
                      ]);
    }

    /**
     * @Route("/student/suc", name="student_suc")
     */
    public function studentSuc(Request $request, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        
        return $this->render('student_add/suc.html.twig');
    }
}

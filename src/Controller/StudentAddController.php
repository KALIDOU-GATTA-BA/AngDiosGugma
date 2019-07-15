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
    public function studentAdd(Request $request)
    {
        $form = $this->createForm(StudentAddType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('home');
        }
        return $this->render('student_add/index.html.twig', [
                           'student_add' => $form->createView(),
                      ]);
    }
}

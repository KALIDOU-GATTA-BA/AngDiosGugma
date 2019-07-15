<?php

namespace App\Controller;

use App\Form\TeacherAddType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\TeacherAddRepository;
use App\Handlers\Form\TeacherAddFormHandler;
class TeacherAddController extends AbstractController
{
    private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(TeacherAddFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/teacher/add", name="teacher_add")
     */
    public function teacherAdd(Request $request)
    {
        $form = $this->createForm(TeacherAddType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('home');
        }
        return $this->render('teacher_add/index.html.twig', [
                           'teacher_add' => $form->createView(),
                      ]);
    }
}

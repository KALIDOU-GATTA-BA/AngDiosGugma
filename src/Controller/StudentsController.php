<?php
namespace App\Controller;

use App\Form\StudentsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\StudentsRepository;
use App\Services\StudentsManager;
use App\Handlers\Form\StudentsFormHandler;
use App\Services\CheckConnectionManager;

class StudentsController extends AbstractController
{
    private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(StudentsFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/students", name="students")
     */
    public function students(Request $request, StudentsManager $sm, CheckConnectionManager $cnm)
    {
        $form = $this->createForm(StudentsType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            if ($sm->findStudent()==1) {
                return $this->redirectToRoute('found_student');
            } else {
                return $this->redirectToRoute('not_found_student');
            }
        }
        return $this->render('students/index.html.twig', [
                           'students' => $form->createView(),
        ]);
    }
}

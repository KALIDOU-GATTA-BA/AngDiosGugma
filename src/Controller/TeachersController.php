<?php
namespace App\Controller;

use App\Form\TeachersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\TeachersRepository;
use App\Handlers\Form\TeachersFormHandler;
use App\Services\TeachersManager;

class TeachersController extends AbstractController
{
    private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(TeachersFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/teachers", name="teachers")
     */
    public function students(Request $request, TeachersManager $tm)
    {
        $form = $this->createForm(TeachersType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            if ($tm->findTeacher()==1) {
                return $this->redirectToRoute('found');
            } else {
                return $this->redirectToRoute('not_found');
            }
        }
        return $this->render('teachers/index.html.twig', [
                           'teachers' => $form->createView(),
                      ]);
    }
}

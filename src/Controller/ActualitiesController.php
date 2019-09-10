<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ActualitiesType;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesFormHandler;
use App\Entity\Actualities;
use App\Services\ActualitiesManager;

class ActualitiesController extends AbstractController
{
    private $formHandler;
    
    /**
     * @var ContactFormHandler
     */
    public function __construct(ActualitiesFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }

    /**
     * @Route("/actualities", name="actualities")
     */
    public function index(Request $request, ActualitiesManager $am)
    {
        $form = $this->createForm(ActualitiesType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('home');
        }
       
        return $this->render('actualities/index.html.twig', [
            'actualities' => $form->createView(),
        ]);
    }

    /**
     * @Route("/recap_actualities", name="recap_actualities")
     */
    public function recapActualities(Request $request, ActualitiesManager $am)
    {
       $repo = $this->getDoctrine()->getRepository(Actualities::class);
        $articles = $repo ->findAll() ;
        return $this->render('actualities/recap_actualities.html.twig', [
            'articles' => $articles,
            ]);
    }
}

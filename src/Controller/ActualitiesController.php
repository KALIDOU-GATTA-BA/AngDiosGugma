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
        $form = $this->createForm(ActualitiesType::class)->handleRequest($request);

        $article1Title=$am->getLast3Actualities()[0];
        $article1Content=$am->getLast3Actualities()[1];

        $article2Title=$am->getLast3Actualities()[2];
        $article2Content=$am->getLast3Actualities()[3];

        $article3Title=$am->getLast3Actualities()[4];
        $article3Content=$am->getLast3Actualities()[5];

        return $this->render('actualities/recap_actualities.html.twig', [
            'article1Title' => $article1Title,
            'article1Content' => $article1Content,
            'article2Title' => $article2Title,
            'article2Content' => $article2Content,
            'article3Title' => $article3Title,
            'article3Content' => $article3Content,
        ]);
    }
}

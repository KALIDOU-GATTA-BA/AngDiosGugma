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
use Doctrine\ORM\EntityManagerInterface;

class ActualitiesController extends AbstractController
{
    private $entityManager;
    private $formHandler;
    
    /**
     * @var ContactFormHandler
     */
    public function __construct(ActualitiesFormHandler $formHandler, EntityManagerInterface $entityManager)
    {
        $this->formHandler = $formHandler;
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/actualities", name="actualities")
     */
    public function index(Request $request, ActualitiesManager $am)
    {


        $formr = $this->createForm(ActualitiesType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/'.$am->maxId()[0][1].'', $fileName);
            return $this->redirectToRoute('recap_actualities');
        }
        return $this->render('actualities/index.html.twig', [
            'actualities' => $formr->createView(),
        ]);
    }
    /**
     * @Route("/recap_actualities", name="recap_actualities")
     */
    public function recapActualities(Request $request, ActualitiesManager $am)
    {
        return $this->render('actualities/recap_actualities.html.twig', [
            'articles' => $am->getAllActu(),
            ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\IloiloType;
use App\Form\CapizType;
use App\Form\AntiqueType;
use App\Repository\IloiloRepository;
use App\Handlers\Form\IloiloFormHandler;
use Symfony\Component\HttpFoundation\Request;

class OperationsController extends AbstractController
{
	private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(IloiloFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/operations", name="operations")
     */
    public function index()
    {
        return $this->render('operations/index.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }
    /**
     * @Route("/iloilo", name="iloilo")
     */
    public function iloilo(Request $request)
    {
    	$form = $this->createForm(IloiloType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
        	return $this->redirectToRoute('recap_iloilo');
        }
        return $this->render('operations/iloilo.html.twig', [
            'iloilo' => $form->createView(),
        ]);
    }
    /**
     * @Route("/capiz", name="capiz")
     */
    public function capiz(Request $request)
    {
    	
        $form = $this->createForm(CapizType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
        	return $this->redirectToRoute('recap_capiz');
        }
        return $this->render('operations/capiz.html.twig', [
            'capiz' => $form->createView(),
            ]);
    }

    /**
     * @Route("/antique", name="antique")
     */
    public function antique(Request $request)
    {
        
        $form = $this->createForm(AntiqueType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
        	return $this->redirectToRoute('recap_antique');
        }
        return $this->render('operations/antique.html.twig', [
            'antique' => $form->createView(),
            ]);
    }
    /**
     * @Route("/aklan", name="aklan")
     */ 
    public function aklan(Request $request)
    {

    	$form = $this->createForm(AklanType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
        	return $this->redirectToRoute('recap_aklan');
        }

        return $this->render('operations/aklan.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }

    /**
     * @Route("/guimaras", name="guimaras")
     */
    public function guimaras(Request $request)
    {
        return $this->render('operations/guimaras.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }
    /**
     * @Route("/negros", name="negros")
     */
    public function negros(Request $request)
    {
        return $this->render('operations/negros.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }
    /**
     * @Route("/mindanao", name="mindanao")
     */
    public function mindanao(Request $request)
    {
        return $this->render('operations/mindanao.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }
    /**
     * @Route("/metroManila", name="metroManila")
     */
    public function metroManila(Request $request)
    {
        return $this->render('operations/metroManila.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }
    /**
     * @Route("/international", name="international")
     */
    public function international(Request $request)
    {
        return $this->render('operations/international.html.twig', [
            'controller_name' => 'OperationsController',
        ]);
    }

}

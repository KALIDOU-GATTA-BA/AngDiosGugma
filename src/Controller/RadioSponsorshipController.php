<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\RadioSponsorshipType;
use App\Entity\RadioSponsorship;
use App\Handlers\Form\RadioSponsorshipFormHandler;
use App\Services\RadioSponsorshipManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use App\Services\CheckConnectionManager;


class RadioSponsorshipController extends AbstractController
{

   
    public function __construct(RadioSponsorshipFormHandler $formHandler, RadioSponsorshipManager $rsm, EntityManagerInterface $entityManager, Security $security)
    {
        $this->formHandler = $formHandler;
        $this->entityManager = $entityManager; 
        $this->security = $security;
        $this->rsm = $rsm;
    }

    /**
     * @Route("/radio/sponsorship", name="radio_sponsorship")
     */
    public function index(CheckConnectionManager $cnm, Request $request)
    {
    	$cnm->CheckConnection();
        $cnm->roleAdmin();

        $form = $this->createForm(RadioSponsorshipType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('radio_sponsorship_recap');
        }
        

        return $this->render('radio_sponsorship/index.html.twig', [
            'rs' => $form->createView(),
        ]);
    }

    /**
     * @Route("/radio/sponsorship/recap", name="radio_sponsorship_recap")
     */
    public function recap(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();
        return $this->render('radio_sponsorship/recap.html.twig', [
            'allSponsorships' => $this->rsm->getAllRadioSponsorships(),
            'totalAmount' => $this->rsm->getTotalAmount(),
            'spInt' =>$this->rsm->getNumberOfInternationnalSponsorships(),
            'spNum' => sizeof($this->rsm->getAllRadioSponsorships()),
        ]);
    }

	/**
     * @Route("/radio/sponsorship/search", name="radio_sponsorship_search")
     */
    public function search(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();
        return $this->render('radio_sponsorship/search.html.twig', [
        ]);
    }


	/**
     * @Route("/radio/sponsorship/delete", name="radio_sponsorship_delete")
     */
    public function delete(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();
        return $this->render('radio_sponsorship/delete.html.twig', [
            'controller_name' => 'RadioSponsorshipController',
        ]);
    }

    /**
     * @Route("/radio/sponsorship/update", name="radio_sponsorship_update")
     */
    public function update(CheckConnectionManager $cnm)
    {
        //$cnm->CheckConnection();
        //$cnm->roleAdmin();
        return $this->render('radio_sponsorship/update.html.twig', [
            'controller_name' => 'RadioSponsorshipController',
        ]);
    }


}

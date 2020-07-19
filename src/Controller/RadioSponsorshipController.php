<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\RadioSponsorshipType;
use App\Form\SponsorPaymentsType;
use App\Entity\RadioSponsorship;
use App\Handlers\Form\RadioSponsorshipFormHandler;
use App\Services\RadioSponsorshipManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use App\Services\CheckConnectionManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

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
         ////   'allAmount'=>$this->rsm->amount(),
           // 'lastPaymentDate'=>$this->rsm->lastPaymentDate(),
            //'lastPaymentAmount'=>,
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
        $this->rsm->delete($_GET['sponsor_id']);
        return $this->redirectToRoute('radio_sponsorship_recap');
        return $this->render('radio_sponsorship/delete.html.twig', [
            'controller_name' => 'RadioSponsorshipController',
        ]);
    }

    /**
     * @Route("/radio/sponsorship/update", name="radio_sponsorship_update")
     */
    public function update(CheckConnectionManager $cnm, Request $request)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();


         $ss=new Session();

         $ss->set('id', $_GET['sponsor_id']);

        $form = $this->createForm(RadioSponsorshipType::class)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formr=$form->getData();
            $this->rsm->update($formr->getAdName(),$formr->getSolicitor(),$formr->getNumberOfWeek(), $formr->getA1(), $formr->getA2(), $formr->getA3(), $formr->getRp120(), $formr->getAmount(), $formr->getArDiese(), $formr->getAr(), $formr->getDate(), $formr->getAdDateFrom(), $formr->getAdDateTo(), $formr->getRenewDate(), $formr->getContactNumber(), $formr->getArea() );
            return $this->redirectToRoute('radio_sponsorship_recap');
        }
        
        return $this->render('radio_sponsorship/update.html.twig', [
            'rs' => $form->createView(), 
            'solicitor'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getSolicitor(),
            'numberOfWeek'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getNumberOfWeek(),
            'a1'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getA1(),
            'a2'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getA2(),
            'a3'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getA3(),
            'rp120'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getRp120(),
            'adName'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getAdName(),
            'amount'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getAmount(),
            'arDiese'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getArDiese(),
            'ar'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getAr(),
            'date'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getDate(),
            'adDateFrom'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getAdDateFrom(),
            'adDateTo'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getAdDateTo(),
            'renewDate'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getRenewDate(),
            'contactNumber'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getContactNumber(),
            'area'=>$this->rsm->getSponsorById($_GET['sponsor_id'])->getArea(),
        ]);
    }

    /**
     * @Route("/radio/sponsorship/addP", name="radio_sponsorship_add_p")
     */
    public function addP(CheckConnectionManager $cnm, Request $request)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();
        $formr = $this->createForm(SponsorPaymentsType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            if ($this->rsm->checkName($form->getName())!=null) {
                $this->entityManager->persist($form);
                $this->entityManager->flush();
                foreach ($this->rsm->getAllRadioSponsorships() as $key ) {
                  if ($this->rsm->amountPayment($key->getSolicitor())!=null) {
                      $total=(float)$this->rsm->amountPayment($key->getSolicitor())[0]["amount"];
                      $key->setAmount($total+$key->getAmount());
                      $this->entityManager->persist($key);
                      $this->entityManager->flush();
                  }
                }
                return $this->redirectToRoute('radio_sponsorship_recap');
            }else{
                $name=$form->getName();
                echo "<script>alert('$name: - doesn\'t exist yet in the sponsorships. Check the sponsorships list or add - $name - as a new sponsor.');</script>";
            }
        }
        return $this->render('radio_sponsorship/add_p.html.twig', [
            'sponsorPayment' => $formr->createView(),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\DonationProcess_1Type;
use App\Form\DonationProcess_2Type;
use App\Repository\DonationRepository;
use App\Handlers\Form\DonationFormHandler;
use App\Entity\Donation;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\DonationPayment;



//use App\Services\DontationManager;


class DonationController extends AbstractController	
{

	private $formHandler;
    
    /**
     * @var ContactFormHandler
     */
     public function __construct(DonationFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }

    /**
     * @Route("/donationProcess_1", name="donationProcess_1")
     */
    public function donationProcess_1(Request $request)
    {

        $form = $this->createForm(DonationProcess_1Type::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('donationProcess_2');
        }
       
         return $this->render('donation/donationProcess_1.html.twig', [
            'donationProcess_1' => $form->createView(),
        ]);
    }

    /**
     * @Route("/donationProcess_2", name="donationProcess_2")
     */
    public function donationProcess_2(Request $request)
    {

        $form = $this->createForm(DonationProcess_2Type::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('go_to_payment');
        }
       
         return $this->render('donation/donationProcess_2.html.twig', [
            'donationProcess_2' => $form->createView(),
        ]);

    }

    /**
     * @Route("/donationPayment", name="donation_payment")
     */
    public function donationPayment()
    {
        \Stripe\Stripe::setApiKey('jhgf');
        $request = new Request(
            $_GET,
            $_POST
                    );
        $token = $request->request->get('stripeToken');

        $charge = \Stripe\Charge::create([
            'amount' => 10,
            'currency' => 'eur',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        if ('succeeded' == $charge['status']) {
                
                return $this->redirectToRoute('home');
        }
        else
        {
            die();
        }

        return $this->render('donation/donation_payment.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }
    /**
     * @Route("/payment", name="go_to_payment")
     */
    public function goToPayment(){
        $amount=10;
        return $this->render('donation/payment.html.twig', [
            'amount' => $amount,
        ]);
    }

}

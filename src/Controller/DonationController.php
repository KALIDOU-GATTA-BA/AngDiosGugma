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
use Symfony\Component\HttpFoundation\Session\Session;

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
     * @Route("/donation", name="donationProcess_1")
     */
    public function donationProcess_1(Request $request)
    {
        $form = $this->createForm(DonationProcess_1Type::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $ss=new Session();
            $ss->set('donationForm1', $form->getNormData());

            return $this->redirectToRoute('donationProcess_2');
        }
       
        return $this->render('donation/donationProcess_1.html.twig', [
            'donationProcess_1' => $form->createView(),
        ]);
    }

    /**
     * @Route("/donation/amount&currency", name="donationProcess_2")
     */
    public function donationProcess_2(Request $request)
    {
        $form = $this->createForm(DonationProcess_2Type::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $ss=new Session();
            $ss->set('donationForm2', $form->getNormData());
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
        //https://stripe.com/docs/payments/checkout/migration
        \Stripe\Stripe::setApiKey('sk_live_MWSJiYoZFUW0BMRStG3xoFn600cJ9dDBUB');
        $request = new Request(
            $_GET,
            $_POST
                    );
        $token = $request->request->get('stripeToken');

        $ss=new Session();
     
        $charge = \Stripe\Charge::create([
            'amount' => $ss->get('donationForm2')->getAmount()*100,
            'currency' => ''.$ss->get('donationForm2')->getCurrency().'',
            'description' => 'Ang Dios Gugma',
            'source' => $token,
        ]);

        if ('succeeded' == $charge['status']) {
            $ss->set('charge', $charge['id']);
            return $this->redirectToRoute('payment_succeeded');
        } else {
            return $this->redirectToRoute('payment_failed');
        }

        return $this->render('donation/donation_payment.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }

    /**
     * @Route("/payment", name="go_to_payment")
     */
    public function goToPayment()
    {
        $ss=new Session();

        $amount=$ss->get('donationForm2')->getAmount()*100;
        $currency=$ss->get('donationForm2')->getCurrency();
        return $this->render('donation/payment.html.twig', [
            'amount' => $amount,
            'currency'=>$currency,
        ]);
    }
    /**
     * @Route("/paymentSucceeded", name="payment_succeeded")
     */
    public function thanks(\Swift_Mailer $mailer)
    {
        $ss=new Session();
        $name=$ss->get('donationForm1')->getName();
        $email=$ss->get('donationForm1')->getEmail();
        $amount=$ss->get('donationForm2')->getAmount();
        $currency=$ss->get('donationForm2')->getCurrency();
        $ref=$ss->get('charge');
        $messageToUser = (new \Swift_Message('Donation'))
        ->setFrom('kalidougattaba@gmail.com')
        ->setTo(''.$email.'')
        ->setBody(
            $this->renderView(
                'emails/mailPayment.html.twig',
                ['name' => $name,
                 'amount' => $amount,
                 'currency' => $currency,
                 'ref'=>$ref,
                ]
            ),
            'text/html'
        )
    ;
        //daulomarygrace@yahoo.com
        $phone=$ss->get('donationForm1')->getPhone();
        $occupation=$ss->get('donationForm1')->getOccupation();
        $age=$ss->get('donationForm1')->getAge();
        $country=$ss->get('donationForm1')->getCountry();
        $messageToAdmin = (new \Swift_Message('Donation'))
        ->setFrom('baniabina.ba@gmail.com')
        ->setTo('kalidougattaba@gmail.com')
        ->setBody(
            $this->renderView(
                'emails/mailToAdmin.html.twig',
                ['name' => $name,
                 'amount' => $amount,
                 'currency' => $currency,
                 'occupation'=>$occupation,
                 'age'=>$age,
                 'country'=>$country,
                 'phone'=>$phone,
                 'email'=>$email,
                ]
            ),
            'text/html'
        )
    ;


        $mailer->send($messageToUser);
        $mailer->send($messageToAdmin);
        return $this->render('donation/payment_succeeded.html.twig', [
            'name' => $name,
            'email' => $email,
            'amount' => $amount,
            'currency'=>$currency,
        ]);
    }
    
    /**
     * @Route("/paymentFailed", name="payment_failed")
     */
    public function fail()
    {
        $ss=new Session();
        $name=$ss->get('donationForm1')->getName();
        $amount=$ss->get('donationForm2')->getAmount();
        $currency=$ss->get('donationForm2')->getCurrency();
        return $this->render('donation/payment_failed.html.twig', [
            'name' => $name,
            'amount' => $amount,
            'currency'=>$currency,
        ]);
    }
    /**
     * @Route("/maintenance", name="maintenance")
     */
    public function maintenance()
    {
        $ss=new Session();
        $name=$ss->get('donationForm1')->getName();
        $amount=$ss->get('donationForm2')->getAmount();
        $currency=$ss->get('donationForm2')->getCurrency();
        
        return $this->render('donation/maintenance.html.twig', [
            'name' => $name,
            'amount' => $amount,
            'currency' => $currency,
        ]);
    }
}

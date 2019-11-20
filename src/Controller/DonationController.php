<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonationController extends AbstractController
{
    /**
     * @Route("/donation", name="donationProcess_1")
     */
    public function donationProcess_1(Request $request)
    {
        //mail("daulomarygrace@yahoo.com";  
        mail("kalidougattaba@gmail.com", "Paypal ADG", "Someone did a donation to ADG. Check your Paypal balance");     
        return $this->render('donation/donationProcess_1.html.twig');
    }
    
    /**
     * @Route("/transfer", name="money_transfer")
     */
    public function bankTransfer()
    {
        return $this->render('donation/bank_transfer.html.twig');
    }
}

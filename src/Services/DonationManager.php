<?php

namespace App\Services;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DonationManager
{
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;               
    }

    public function sql()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Contact id')->getResult();
        $res1 = $this->entityManager->createQuery('SELECT email FROM App\Entity\Contact email where email.id='.$res[0][1].'')->getResult();

        return [$res1[0]->getLastName(), $res1[0]->getMessage(), $res1[0]->getFirstName(), $res1[0]->getSubject(), $res1[0]->getEmail()];
    }

    public function sendMessage()
    {
        $message = (new \Swift_Message($this->sql()[3]))
                    ->setFrom($this->sql()[4]);

        return $message->setTo('baniabina.ba@gmail.com');
    }
    public function getSessionDonationForm()
    {
        $ss= new Session();
        return $ss->get('donationForm');
    }
    public function setDonationForm()
    {

    }
    public function setSession()
    {
        $session = new Session();

        return $reservation = $session->get('reservation');
    }

    public function checkPayment()
    {
         $session = new Session();

            return $reservation = $session->get('reservation');

    }
} 
 /*

    public function checkPayment()
    {
        \Stripe\Stripe::setApiKey('sk_test_EgBGQdrRZj3PtAaMKLkm4uFV00i7r6061c');
        $request = new Request(
            $_GET,
            $_POST
                    );
        $token = $request->request->get('stripeToken');
        $buffer = 0;
        //$reservation_num = null;
        //$rp = new ReservationProcess();
        if (0 != $rp->getTotal()) {
            $charge = \Stripe\Charge::create([
            'amount' => $rp->getTotal() * 100,
            'currency' => 'eur',
            'description' => 'Example charge',
            'source' => $token,
        ]);

            $reservation_num = $charge['id'];
            $reservation = $rp->getSessionReservation();

            if ('succeeded' == $charge['status']) {
                $reservation->setPayment(true);
                $i = 0;
                foreach ($reservation->getTickets() as $ticket) {
                    $nom = $ticket->getName();
                    $birthDate = $ticket->getBirthDate()->format('Y-m-d');


                    $ticketType = $ticket->getTicketType();
                    ++$i;
                }
                $reservation->setCount($i);
                $this->entityManager->persist($reservation);
                $this->entityManager->flush();
                $buffer = 1;
            } else {
                $reservation->setPayment(false);
                $buffer = -1;
            }
        }

        return [$buffer, $reservation_num];
    }
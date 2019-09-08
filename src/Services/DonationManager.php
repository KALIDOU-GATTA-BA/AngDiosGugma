<?php

namespace App\Services;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
    public function getAmount()
    {
        $ss= new Session();
        return $ss->get('donation')->getAmount();
    }
    public function getCurrency()
    {
        $ss= new Session();
        return $ss->get('donation')->getCurrency();
    }
}

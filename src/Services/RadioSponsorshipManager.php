<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RadioSponsorshipManager
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getAllRadioSponsorships()
    {
        return $this->entityManager->createQuery('SELECT rs FROM App\Entity\RadioSponsorship rs')->getResult();
    }
    public function getTotalAmount()
    {
        return (float)$this->entityManager->createQuery('SELECT sum(rs.amount) FROM App\Entity\RadioSponsorship rs')->getResult()[0][1];
    }

    public function getNumberOfInternationnalSponsorships()
    {
        return sizeof($this->entityManager->createQuery("SELECT rs FROM App\Entity\RadioSponsorship rs where rs.area = 'international'")->getResult());
    }
    public function retrieveSponsorship(string $solicitor)
    {
        return $this->entityManager->createQuery("SELECT rs FROM App\Entity\RadioSponsorship rs where rs.solicitor = '$solicitor' ")->getResult();
    }
    public function checkName(string $name)
    {
        return $this->entityManager->createQuery("SELECT rs FROM App\Entity\RadioSponsorship rs where rs.solicitor = '$name' ")->getResult();
    }
    public function lastPaymentDate()
    {
        return $this->entityManager->createQuery("SELECT rsp.paymentDate FROM App\Entity\SponsorPayments rsp order by rsp.paymentDate desc ")->setMaxResults(1)->getResult()[0]['paymentDate'];
    }
    public function maxIdNameOnPayment($name)
    {
        return (int) (
                $this->entityManager->createQueryBuilder()
                ->add('select', 'max(rsp.id)')
                ->add('from', 'App\Entity\SponsorPayments rsp')
                ->add('where', "rsp.name ='$name' ")

                ->getQuery()->getResult()[0][1]
        )
    ;

    } 
    public function amountPayment($name)
    {
        $id=$this->maxIdNameOnPayment($name);
        return $this->entityManager->createQuery("SELECT rsp.amount FROM App\Entity\SponsorPayments rsp where rsp.id= '$id' ")->setMaxResults(1)->getResult();
    }
    public function update($adName,$solicitor, $numberOfWeek, $a1, $a2, $a3, $rp120, $amount, $arDiese, $ar, $date, $adDateFrom, $adDateTo, $renewDate, $contactNumber, $area)
    {
         $ss=new Session();
       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.adName = '$adName' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.solicitor = '$solicitor' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.numberOfWeek = '$numberOfWeek' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.a1 = '$a1' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.a2 = '$a2' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.a3 = '$a3' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.rp120 = '$rp120' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.amount = '$amount' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.arDiese = '$arDiese' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.ar = '$ar' where rs.id IN (".$ss->get('id').")  ")->getResult();
       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.date = '$date' where rs.id IN (".$ss->get('id').")  ")->getResult();

       $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.adDateFrom = '$adDateFrom' where rs.id IN (".$ss->get('id').")  ")->getResult();

        $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.adDateTo = '$adDateTo' where rs.id IN (".$ss->get('id').")  ")->getResult();

        $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.renewDate = '$renewDate' where rs.id IN (".$ss->get('id').")  ")->getResult();

        $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.contactNumber = '$contactNumber' where rs.id IN (".$ss->get('id').")  ")->getResult();

        $this->entityManager->createQuery(" UPDATE   App\Entity\RadioSponsorship rs SET rs.area = '$area' where rs.id IN (".$ss->get('id').")  ")->getResult();
    }

    public function getSponsorById($id)
    {
         return $this->entityManager->createQuery("SELECT rs FROM App\Entity\RadioSponsorship rs where rs.id = '$id' ")->getResult()[0];
    }
    public function delete($sponsor_id)
    {
         $this->entityManager->createQuery("DELETE  FROM App\Entity\RadioSponsorship rs where rs.id ='$sponsor_id' ")->getResult();
    }
}

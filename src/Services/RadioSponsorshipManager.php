<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


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
        return sizeof( $this->entityManager->createQuery("SELECT rs FROM App\Entity\RadioSponsorship rs where rs.area = 'internationnal'")->getResult());
    }
}

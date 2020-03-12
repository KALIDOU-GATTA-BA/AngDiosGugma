<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class VideoManagerTVProg
{
   
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllVideosAmligan()//18
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=18 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosToday()//1
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=1 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosIpm()//9
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid  where vid.type=9 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosTeleradio()// 2
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid  where vid.type=2 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosBahaghari() //3
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=3 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosWorship()//4
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=4 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosManunodlo()//5
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid  where vid.type=5 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosKubos()//6
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=6 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosMool()//7
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=7 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosGpm()//8
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=8 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosMass()//10
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=10 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosFad()//11
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid  where vid.type=11 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosLd()//12
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid  where vid.type=12 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosKristo()//13
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=13 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }
    public function getAllVideosKaupod()//14
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=14 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosLaiko()//15
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=15 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosGiving()//16
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=16 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosMaria()//17
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=17 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosOutreach()//19
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid  where vid.type=19 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }

    public function getAllVideosSpecialEvents()//20
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid where vid.type=20 order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }
}
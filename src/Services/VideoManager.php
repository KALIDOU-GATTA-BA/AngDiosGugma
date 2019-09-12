<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class VideoManager
{
    private $request;


    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function getLastVideo()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Video id')->getResult();
        $res1 = $this->entityManager->createQuery(' SELECT vid FROM App\Entity\Video vid where vid.id = '.$res[0][1].'')->getResult();
        $a=$res1[0]->getTitle();
        $b=$res1[0]->getLink();
        return [$a, $b];
    }

    public function get6LastVideos()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Video id')->getResult();
        $res1 = $this->entityManager->createQuery(' SELECT vid FROM App\Entity\Video vid ')->getResult();
        $a=$res1[$res[0][1]-1]->getTitle();
        $b=$res1[$res[0][1]-1]->getLink();
        $c=$res1[$res[0][1]-2]->getTitle();
        $d=$res1[$res[0][1]-2]->getLink();
        $e=$res1[$res[0][1]-3]->getTitle();
        $f=$res1[$res[0][1]-3]->getLink();
        $g=$res1[$res[0][1]-4]->getTitle();
        $h=$res1[$res[0][1]-4]->getLink();
        $i=$res1[$res[0][1]-5]->getTitle();
        $j=$res1[$res[0][1]-5]->getLink();
        $k=$res1[$res[0][1]-6]->getTitle();
        $l=$res1[$res[0][1]-6]->getLink();
        return [$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l];
    }
}

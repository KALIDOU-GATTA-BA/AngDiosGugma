<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class YouTubeManager
{
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getLastYouTube()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\YouTube id')->getResult();
        $res1 = $this->entityManager->createQuery(' SELECT vid FROM App\Entity\YouTube vid where vid.id = '.$res[0][1].'')->getResult();
        return $res1[0]->getLink();
    }
}

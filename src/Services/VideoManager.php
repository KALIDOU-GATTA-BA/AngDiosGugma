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
    public function deleteVideo(string $title)
    {
        $res = $this->entityManager->createQuery("DELETE  FROM App\Entity\Video vid where vid.title ='$title' ")->getResult();
        return $res;
    }
    public function getAllVideos()
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid order by vid.id desc')->getResult();
        return $res;
    }
}

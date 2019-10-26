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
    public function maxId()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Video id')->getResult();
        return $res;
    }
    public function deleteVideo(string $title)
    {
        $res = $this->entityManager->createQuery("DELETE  FROM App\Entity\Video vid where vid.title ='$title' ")->getResult();
        return $res;
    }
    public function getAllVideos()
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\Video vid order by vid.id desc')
               ->setMaxResults(20)
               ->getResult();
        $size=sizeof($res);
        return [$res, $size];
    }
    public function goToVideo(string $title)
    {
        $res = $this->entityManager->createQuery(" SELECT vid FROM App\Entity\Video vid where vid.title = '$title' ")->getResult();
        if ($res!=null) {
            $a=$res[0]->getTitle();
            $b=$res[0]->getLink();
            $c=$res[0]->getId();
            return [$a, $b, $c];
        } else {
            return false;
        }
    }
    public function update(string $title, $link)
    {
        $ss=new Session();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Video vid SET vid.title = '$title' where vid.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Video vid SET vid.link = '$link' where vid.id IN (".$ss->get('id').")  ")->getResult();
    }
    public function removeLast($id)
    {
        $res = $this->entityManager->createQuery("DELETE  FROM App\Entity\Video vid where vid.id ='$id' ")->getResult();
        return $res;
    }
    public function getVideoToComment(int $id)
    {
        $res = $this->entityManager->createQuery(" SELECT vid FROM App\Entity\Video vid where vid.id = '$id' ")->getResult();
        $a=$res[0]->getTitle();
        $b=$res[0]->getLink();
        return [$a, $b];
    }
    public function getAllVideoADGSchool()
    {
        $res = $this->entityManager->createQuery('SELECT vid FROM App\Entity\CatholicSchoolVideo vid  order by vid.id desc')->getResult();
        return $res;
    }
    public function getComments(int $id)
    {
        $res = $this->entityManager->createQuery("SELECT comment FROM App\Entity\CommentsVideo comment where comment.idVideo= '$id' order by comment.id asc ")->getResult();
        return $res;
    }
    public function countComments(int $id)
    {
        $res = $this->entityManager->createQuery("SELECT count(comment.id)  FROM App\Entity\CommentsVideo comment where comment.idVideo= '$id'  ")->getResult();
        return $res[0][1];
    }
    public function pagination()
    {
        $res = $this->entityManager->createQuery("SELECT count(vid.id)  FROM App\Entity\Video  vid ")->getResult();
        return (int)$res[0][1];
    }
    public function countCommentsLastVideo()
    {
        $id=(int)$this->maxId()[0][1];
        $res = $this->entityManager->createQuery("SELECT count(comment.id)  FROM App\Entity\CommentsVideo comment where comment.idVideo= '$id'  ")->getResult();
        return (int)$res[0][1];
    }
    public function moreVideos()
    {
    }
}

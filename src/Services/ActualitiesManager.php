<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ActualitiesManager
{
    // private $request;
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getLastActuality()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Actualities id')->getResult();
        if ($res[0][1]) {
            $res1 = $this->entityManager->createQuery(' SELECT actu FROM App\Entity\Actualities actu  where actu.id = '.$res[0][1].'')->getResult();
            $a=$res1[0]->getTitle();
            $b=$res1[0]->getContent();
            $c=$res1[0]->getAuthor();
            $d=$res1[0]->getType();
            return [$a, $b, $c, $d];
        } else {
            return false;
        }
    }
    public function maxId()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Actualities id')->getResult();
        return $res;
    }
    public function getAllActuAnchor()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu  where actu.type=1 order by actu.id desc')->getResult();
        return $res;
    }
    public function getAllActuDailyGospels()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu  where actu.type=2 order by actu.id desc')->getResult();
        return $res;
    }
    public function getAllActuStOfDay()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu where actu.type=3 order by actu.id desc ')->getResult();
        return $res;
    }
    public function getAllActuRadioProg()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu where actu.type=4 order by actu.id desc ')->getResult();
        return $res;
    }
    public function getAllActuTVProg()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu where actu.type=5 order by actu.id desc ')->getResult();
        return $res;
    }
    public function getAllActuUyas()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu where actu.type=6 order by actu.id desc ')->getResult();
        return $res;
    }
    public function deleteActu(string $title)
    {
        $res = $this->entityManager->createQuery("DELETE  FROM App\Entity\Actualities actu where actu.title ='$title' ")->getResult();
        return $res;
    }
    public function goToActu(string $title)
    {
        $res = $this->entityManager->createQuery(" SELECT actu FROM App\Entity\Actualities actu where actu.title = '$title' ")->getResult();
        if ($res!=null) {
            $a=$res[0]->getTitle();
            $b=$res[0]->getContent();
            $c=$res[0]->getAuthor();
            $d=$res[0]->getId();
            return [$a, $b, $c, $d];
        } else {
            return false;
        }
    }
   
    public function update(string $title, $content, $author, $image, $type)
    {
        $ss=new Session();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.title = '$title' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.content = '$content' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.image = '$image' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.author = '$author' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.type ='$type'  where actu.id IN (".$ss->get('id').") ")->getResult();
    }
    public function getActuToComment(int $id)
    {
        $res = $this->entityManager->createQuery(" SELECT actu FROM App\Entity\Actualities actu where actu.id = '$id' ")->getResult();
        
        $a=$res[0]->getTitle();
        $b=$res[0]->getContent();
        $c=$res[0]->getAuthor();
        return [$a, $b, $c];
    }
    public function getComments(int $id)
    {
        $res = $this->entityManager->createQuery("SELECT comment FROM App\Entity\Comments comment where comment.idArticle = '$id' order by comment.id asc ")->getResult();
        return $res;
    }
    public function paginationAnchor()
    {
        $res = $this->entityManager->createQuery("SELECT count(actu.id)  FROM App\Entity\Actualities  actu  where actu.type = 1")->getResult();
        return (int)$res[0][1];
    }
    public function paginationDailyGospels()
    {
        $res = $this->entityManager->createQuery("SELECT count(actu.id)  FROM App\Entity\Actualities  actu  where actu.type = 2")->getResult();
        return (int)$res[0][1];
    }
    public function paginationStOfDay()
    {
        $res = $this->entityManager->createQuery("SELECT count(actu.id)  FROM App\Entity\Actualities  actu  where actu.type = 3")->getResult();
        return (int)$res[0][1];
    }
     public function countCommentsLastActu(){
        $id=(int)$this->maxId()[0][1];
        $res = $this->entityManager->createQuery("SELECT count(comment.id)  FROM App\Entity\Comments comment where comment.idArticle= '$id'  ")->getResult();
        return (int)$res[0][1];
    }
}

<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ActualitiesManager
{
    private $request;
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getLastActuality()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Actualities id')->getResult();
        $res1 = $this->entityManager->createQuery(' SELECT actu FROM App\Entity\Actualities actu  where actu.id = '.$res[0][1].'')->getResult();
        $a=$res1[0]->getTitle();
        $b=$res1[0]->getContent();
        $c=$res1[0]->getAuthor();
        return [$a, $b, $c];
    }
    public function maxId()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\Actualities id')->getResult();
        return $res;
    }
    public function getAllActu()
    {
        $res = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu order by actu.id desc')->getResult();
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
   
    public function update(string $title, $content, $author, $image)
    {
        $ss=new Session();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.title = '$title' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.content = '$content' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.image = '$image' where actu.id IN (".$ss->get('id').")  ")->getResult();
        $res = $this->entityManager->createQuery(" UPDATE   App\Entity\Actualities actu SET actu.author = '$author' where actu.id IN (".$ss->get('id').")  ")->getResult();
    }
}

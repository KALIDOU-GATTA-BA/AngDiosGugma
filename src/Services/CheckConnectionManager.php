<?php

namespace App\Services;

use Symfony\Component\Security\Core\Security;
use Doctrine\Common\Persistence\ObjectManager;


class CheckConnectionManager
{   
    public function __construct(Security $security, ObjectManager $entityManager)
    {
        $this->security = $security;
         $this->entityManager = $entityManager;
    }
    public function checkConnection()
    {
        if ($this->security->getUser()) {
            return $this->security->getUser()->getUsername();
        } else {
            die();
        }
    }
    public function roleAdmin()
    {
        
        $user = $this->security->getUser()->getUsername();
        $res = $this->entityManager->createQuery("SELECT admin FROM App\Entity\User admin where admin.username='$user' ")->getResult();
        if ($res[0]->getAdmin()) {
            return true;
        }
        else{
            return false;
        }
    }
    public function roleTeacher()
    {
        $role=false;
        $user = $this->security->getUser()->getUsername();
        $res = $this->entityManager->createQuery("SELECT admin FROM App\Entity\User admin where admin.username='$user' ")->getResult();
        if ($res[0]->getTeacher()) {
            return true;
        }
        else{
            return false;
        }
    }
}

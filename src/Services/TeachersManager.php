<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class TeachersManager
{
    private $request;


    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    

    public function getTeacher()
    {
        $session = new Session();

        return $session->get('teacher');
    }
    public function getAllTeacherData()
    { 
     $fn = $this->getTeacher()->getFirstName();

        if ($this->findTeacher()==1) {
            $res1 = $this->entityManager->createQuery(" SELECT r FROM App\Entity\TeacherAdd r where r.FirstName =  '$fn' ")->getResult();
            $a=$res1[0]->getFirstName();
            $b=$res1[0]->getLastName();

            return [$a, $b];

                
        }


    }

    public function findTeacher()

    {
        
        $res = $this->entityManager->createQuery('SELECT r FROM App\Entity\TeacherAdd r ')->getResult();

        $i=''; 
        $j='';
        $buffer=0;
      
        foreach ($res as $_res) {
            
                $i=$this->getTeacher()->getFirstName();
                $j=$this->getTeacher()->getLastName();

                    if ($_res->getFirstName()==$i && $_res->getLastName()==$j) {
                        $buffer=1;
                    }
            }
        return $buffer;
    }
}
<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class StudentsManager
{
    private $request;


    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    

    public function getStudent()
    {
        $session = new Session();

        return $session->get('student');
    }
    public function getAllStudentData()
    {
        $fn = $this->getStudent()->getFirstName();

        if ($this->findStudent()==1) {
            $res1 = $this->entityManager->createQuery(" SELECT r FROM App\Entity\StudentAdd r where r.FirstName =  '$fn' ")->getResult();
            $a=$res1[0]->getFirstName();
            $b=$res1[0]->getLastName();
            $c=$res1[0]->getCity();
            $d=$res1[0]->getLevel();
            $e=$res1[0]->getBirthDate();

            return [$a, $b, $c, $d, $e];
        }
    }

    public function findStudent()
    {
        $res = $this->entityManager->createQuery('SELECT r FROM App\Entity\StudentAdd r ')->getResult();

        $i=''; 
        $j='';
        $buffer=0;
      
        foreach ($res as $_res) {
            $i=$this->getStudent()->getFirstName();
            $j=$this->getStudent()->getLastName();

            if ($_res->getFirstName()==$i && $_res->getLastName()==$j) {
                $buffer=1;
            }
        }
        return $buffer;
    }
}

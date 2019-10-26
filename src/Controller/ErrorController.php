<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;

class ErrorController extends AbstractController
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    /**
     * @Route("/error/admin", name="error_admin")
     */
    public function admin()
    {
        $user=new User();
        $user=$this->getUser()->getUsername();

        return $this->render('error/admin.html.twig', [
            'user' => $user,
        ]);
    }
    /**
     * @Route("/error/teacher", name="error_teacher")
     */
    public function teacher()
    {
        $user=new User();
        $user=$this->getUser()->getUsername();
        return $this->render('error/teacher.html.twig', [
             'user' => $user,
        ]);
    }
}

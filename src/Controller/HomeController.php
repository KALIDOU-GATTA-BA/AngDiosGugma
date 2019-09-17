<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;
use App\Services\VideoManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;

class HomeController extends AbstractController
{
    public function __construct(Security $security)
    {
        // Avoid calling getUser() in the constructor: auth may not
        // be complete yet. Instead, store the entire Security object.
        $this->security = $security;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(ActualitiesManager $am, VideoManager $vm)
    {
        
        // dd(    );
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        
        $videoTitle=$vm->getLastVideo()[0];
        $videoLink= $vm->getLastVideo()[1];
        $lastActuTitle=$am->getLastActuality()[0];
        $lastActuContent=$am->getLastActuality()[1];
        $lastActuContent=substr($lastActuContent, 0, 100).'[...]';
        $author=$am->getLastActuality()[2];
        return $this->render('home/index.html.twig', [
            'lastActuContent' => $lastActuContent,
            'lastActuTitle' => $lastActuTitle,
            'author' => $author,
            'videoLink'=>$videoLink,
            'videoTitle'=>$videoTitle,
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/adminHome", name="admin_home")
     */
    public function adminHome()
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('home/adminHome.html.twig', [
            'lastActuContent' => 'adminHome',
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
}

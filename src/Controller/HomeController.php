<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;
use App\Services\VideoManager;
use App\Services\CheckConnectionManager;
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
       //dd($am->getAllActuAnchor()[0][0]);
        $user='';
        $buffer=false;
        $author='';
        $lastActuTitle='';
        $lastActuContent='';
        $type=0;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $videoTitle=$vm->getLastVideo()[0];
        $videoLink= $vm->getLastVideo()[1];
        if ($am->getLastActuality()) {
            $lastActuTitle=$am->getLastActuality()[0];
            $lastActuContent=$am->getLastActuality()[1];
            $lastActuContent=substr($lastActuContent, 0, 70).'[...]';
            $author=$am->getLastActuality()[2];
            $type=$am->getLastActuality()[3];
        }
        // return $this->redirectToRoute('maintenance_general') ;
        return $this->render('home/index.html.twig', [
            'lastActuContent' => $lastActuContent,
            'lastActuTitle' => $lastActuTitle,
            'author' => $author,
            'videoLink'=>$videoLink,
            'videoTitle'=>$videoTitle,
            'buffer'=>$buffer,
            'user'=>$user,
            'type'=>$type,
            'countComments'=>$am->countCommentsLastActu(),
            'countCommentsVideo'=>$vm->countCommentsLastVideo(),
        ]);
    }
    /**
    * @Route("/maintenance/general", name="maintenance_general")
    */
    public function maintenance()
    {
        return $this->render('home/maintenance.html.twig', [
            '' => '',
        ]);
    }
 
    /**
     * @Route("/adminHome", name="admin_home")
     */
    public function adminHome(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        return $this->render('home/adminHome.html.twig', [
            'lastActuContent' => 'adminHome',
            'buffer'=>true,
            'user'=>$cnm->CheckConnection(),
        ]);
    }
}

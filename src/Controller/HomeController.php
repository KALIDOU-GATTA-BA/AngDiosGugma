<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;
use App\Services\VideoManager;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ActualitiesManager $am, VideoManager $vm)
    {
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
        ]);
    }
    /**
     * @Route("/adminHome", name="admin_home")
     */
    public function adminHome()
    {
        return $this->render('home/adminHome.html.twig', [
            'lastActuContent' => 'adminHome',
        ]);
    }
}

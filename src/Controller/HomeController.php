<?php
/*
htaccess file for rewriting HTTP to HTTPS
#SetEnv SHORT_OPEN_TAGS 0
#SetEnv REGISTER_GLOBALS 0
#SetEnv MAGIC_QUOTES 0
#SetEnv SESSION_AUTOSTART 0
#SetEnv ZEND_OPTIMIZER 1
#SetEnv PHP_VER 7_2
RewriteEngine on
RewriteBase /
RewriteCond %{SERVER_PORT} 80
RewriteRule .* https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
RewriteCond %{REQUEST_URI} !^/public/
RewriteRule ^(.*)$ /public/$1 [L]
*/
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;
use App\Services\VideoManager;
use App\Services\CheckConnectionManager;
use App\Services\YouTubeManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;

class HomeController extends AbstractController
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    /**
     * @Route("/LN", name="legal_notices")
     */
    public function legalNotices()
    {
        return $this->render('home/legal_notices.html.twig');
    }
    /**
     * @Route("/", name="home")
     */
    public function index(ActualitiesManager $am, VideoManager $vm, CheckConnectionManager $cnm, YouTubeManager $yt)
    {
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
            $lastActuContent=strip_tags($am->getLastActuality()[1]);
            $lastActuContent=substr($lastActuContent, 0, 150).'[...]';
            $author=$am->getLastActuality()[2];
            $type=$am->getLastActuality()[3];
            $admin=$am->getLastActuality()[4];
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
            'admin'=>$admin,
            'countComments'=>$am->countCommentsLastActu(),
            'countCommentsVideo'=>$vm->countCommentsLastVideo(),
            'youtube'=>$yt->getLastYouTube(),
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
        $cnm->roleAdmin();
        if (!$cnm->roleAdmin()) {
            return $this->redirectToRoute('error_admin');
        }
        return $this->render('home/adminHome.html.twig', [
            'lastActuContent' => 'adminHome',
            'buffer'=>true,
            'user'=>$cnm->CheckConnection(),
        ]);
    }
    /**
     * @Route("/adminHomeTeacher", name="admin_home_teacher")
     */
    public function adminHomeTeacher(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        if (!$cnm->roleTeacher()) {
            return $this->redirectToRoute('error_teacher');
        }
        return $this->render('home/adminHomeTeacher.html.twig', [
            'buffer'=>true,
            'user'=>$cnm->CheckConnection(),
        ]);
    }
    /**
     * @Route("/interval", name="interval")
     */
    public function interval(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        return $this->render('home/interval.html.twig');
    }
    /**
     * @Route("/method", name="donation_method")
     */
    public function donationMethod()
    {
        return $this->render('home/donation_method.html.twig');
    }
}

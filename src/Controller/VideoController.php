<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use App\Handlers\Form\VideoFormHandler;
use App\Entity\Video;
use App\Services\VideoManager;
use App\Handlers\Form\YouTubeFormHandler;
use App\Form\YouTubeType;
use App\Services\CheckConnectionManager;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use App\Services\YouTubeManager;
use Doctrine\ORM\EntityManagerInterface;


class VideoController extends AbstractController
{
    private $formHandler;
    
    /**
     * @var ContactFormHandler
     */
    public function __construct(VideoFormHandler $formHandler, YouTubeFormHandler $YTformHandler, Security $security, EntityManagerInterface $entityManager)
    {
        $this->formHandler = $formHandler;
        $this->YTformHandler = $YTformHandler;
        $this->security = $security;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/video", name="video")
     */
    public function index(Request $request, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $temp=0;
        $cnm->roleAdmin();
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $form = $this->createForm(VideoType::class)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            if (!preg_match('/<iframe/', $form->getLink())) {
                return $this->redirectToRoute('errorLink');
            }else{ 
                $this->entityManager->persist($form);
                $this->entityManager->flush();
            return $this->redirectToRoute('home'); 
            }  
        }
       
        $formYT = $this->createForm(YouTubeType::class)->handleRequest($request);
        if ($this->YTformHandler->handle($formYT)) {
            return $this->redirectToRoute('home');
        }
        else{
            $temp=1;
           // mail("kalidougattaba@gmail.com", "YT", $user);     
        }
        return $this->render('video/index.html.twig', [
            'video' => $form->createView(),
            'videoYT' => $formYT->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
            'temp'=>$temp,
        ]);
    }
    /**
     * @Route("/errorLink", name="errorLink")
     */
    public function errorLink(CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();
        mail("kalidougattaba@gmail.com", "Error in the Link", $this->security->getUser()->getUsername());
        return $this->render('video/errorLink.html.twig', [
            'user' => $this->security->getUser()->getUsername(),
        ]);
    }
    
    /**
     * @Route("/delete/video", name="delete_video")
     */
    public function deleteVideo(VideoManager $vm)
    {
        $vm->deleteVideo($_GET['val']);
        return $this->redirectToRoute('video');
    }
    /**
     * @Route("/update/video/select", name="update_video_select")
     */
    public function selectVideoToUpdate(VideoManager $vm)
    {
        $vm->goToVideo($_GET['val']);
        if (!$vm->goToVideo($_GET['val'])) {
            return $this->redirectToRoute('video');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $vm->goToVideo($_GET['val'])[2]);
        return $this->redirectToRoute('update_video');
    }
}

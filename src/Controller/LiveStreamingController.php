<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\VideoManager;
use App\Entity\Video;
use App\Handlers\Form\VideoFormHandler;
use App\Entity\User;
use App\Form\VideoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Security;

class LiveStreamingController extends AbstractController
{
    public function __construct(Security $security, VideoFormHandler $formHandler)
    {
        $this->security = $security;
        $this->formHandler = $formHandler;
    }
    
    /**
     * @Route("/live/streaming", name="live_streaming")
     */
    public function index(VideoManager $vm)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
     //   return $this->redirectToRoute('maintenance_general') ;

        $repo = $this->getDoctrine()->getRepository(Video::class);
        $videos = $repo ->findAll() ;
        return $this->render('live_streaming/index.html.twig', [
            'videos' => $vm->getAllVideos(),
             'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/live/maintenanceSTOP", name="live_maintenance")
     */
    public function maintenance()
    {
        return $this->render('live_streaming/maintenance.html.twig', [
            'videos' => '',
        ]);
    }
 
    /**
     * @Route("/update/video", name="update_video")
     */
    public function updateVideo(VideoManager $vm, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $ss=new Session();

        $title=$vm->goToVideo(''.$ss->get('title').'')[0];
        $link=$vm->goToVideo(''.$ss->get('title').'')[1];
        $form = $this->createForm(VideoType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $vm->update($form->getNormData()->getTitle(), $form->getNormData()->getLink());
            $vm->removeLast($vm->maxId()[0][1]);
            return $this->redirectToRoute('live_streaming');
        }
        return $this->render('live_streaming/update_video.html.twig', [
            'videos' => $vm->getAllVideos(),
            'buffer'=>$buffer,
            'user'=>$user,
            'buffer'=>$buffer,
            'title'=>$title,
            'link'=>$link,
            'update_video'=>$form->createView(),
            ]);
    }
}

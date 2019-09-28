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
use App\Form\CommentsVideoType;
use App\Entity\CommentsVideo;
use Doctrine\ORM\EntityManagerInterface;
use App\Handlers\Form\CommentsVideoFormHandler;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LiveStreamingController extends AbstractController
{
    public function __construct(Security $security, VideoFormHandler $formHandler, SessionInterface $session, CommentsVideoFormHandler $cfh, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->formHandler = $formHandler;
        $this->cfh=$cfh;
        $this->entityManager = $entityManager;
        $this->session = $session;
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
            'pagination'=>$vm->pagination(),
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
        $ss = $this->session;

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
    /**
     * @Route("/comment/video", name="comment_video")
     */
    public function commentVideo(VideoManager $vm, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(CommentsVideoType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $this->session;
        $ss->set('idVideo', $_GET['val']);
        return $this->render('live_streaming/comment_video.html.twig', [
            'comment_video' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
            'title'=>$vm->getVideoToComment($_GET['val'])[0],
            'link'=>$vm->getVideoToComment($_GET['val'])[1],
            'idVideo'=>$_GET['val'],
            'comments'=>$vm->getComments($_GET['val']),
            ]);
    }
    /**
     * @Route("/show/comments/video", name="show_comments_video")
     */
    public function showComments(VideoManager $vm)
    {
        $ss = $this->session;
        return $this->render('live_streaming/show_comments.html.twig', [
         
            'title'=>$vm->getVideoToComment($ss->get('idVideo'))[0],
            'link'=>$vm->getVideoToComment($ss->get('idVideo'))[1],
            'idVideo'=>$ss->get('idVideo'),
            'comments'=>$vm->getComments($ss->get('idVideo')),
        ]);
    }
}

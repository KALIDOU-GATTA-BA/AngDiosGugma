<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManagerSingapore;
use App\Entity\User;
use App\Entity\VideoSingapore;
use App\Form\ActualitiesSingaporeType;
use App\Form\CommentsSingaporeType;
use App\Entity\CommentsSingapore;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesSingaporeFormHandler;
use App\Handlers\Form\CommentsSingaporeFormHandler;
use App\Entity\ActualitiesSingapore;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Services\VideoManagerSingapore;
use App\Handlers\Form\VideoSingaporeFormHandler;
use App\Form\VideoSingaporeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use App\Form\CommentsVideoSingaporeType;
use App\Entity\CommentsVideoSingapore;
use App\Handlers\Form\CommentsVideoFormHandler;
use App\Services\CheckConnectionManager;

class SingaporeController extends AbstractController
{
    private $entityManager;
    private $formHandler;
    private $cfh;
    private $cvsfh;
    private $videoSingaporeformHandler;
 
    public function __construct(ActualitiesSingaporeFormHandler $formHandler, VideoSingaporeFormHandler $videoSingaporeformHandler, SessionInterface $session, CommentsVideoFormHandler $cvsfh, CommentsSingaporeFormHandler $cfh, EntityManagerInterface $entityManager, Security $security)
    {
        $this->formHandler = $formHandler;
        $this->cfh=$cfh;
        $this->cvsfh=$cvsfh;
        $this->entityManager = $entityManager;
        $this->security = $security;
        $this->session = $session;
        $this->videoSingaporeformHandler = $videoSingaporeformHandler;
    }
    /**
     * @Route("/Singapore", name="singapore")
     */
    public function index(ActualitiesManagerSingapore $ams, VideoManagerSingapore $vms)
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
        $videoTitle=$vms->getLastVideo()[0];
        $videoLink= $vms->getLastVideo()[1];
        if ($ams->getLastActuality()) {
            $lastActuTitle=$ams->getLastActuality()[0];
            $lastActuContent=$ams->getLastActuality()[1];
            $lastActuContent=substr($lastActuContent, 0, 60).'[...]';
            $author=$ams->getLastActuality()[2];
        }
        // return $this->redirectToRoute('maintenance_general') ;
        return $this->render('singapore/home/index.html.twig', [
            'lastActuContent' => $lastActuContent,
            'lastActuTitle' => $lastActuTitle,
            'author' => $author,
            'videoLink'=>$videoLink,
            'videoTitle'=>$videoTitle,
            'buffer'=>$buffer,
            'user'=>$user,
            'countComments'=>$ams->countCommentsLastActu(),
            'countCommentsVideo'=>$vms->countCommentsLastVideo(),
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
    
    /**
     * @Route("/actualities/singapore", name="actualities_singapore")
     */
    public function index2(Request $request, ActualitiesManagerSingapore $ams, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $formr = $this->createForm(ActualitiesSingaporeType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploadsSingapore/'.$ams->maxId()[0][1].'', $fileName);
            return $this->redirectToRoute('recap_actualities_singapore');
        }
        return $this->render('singapore/home/actualities_singapore_admin.html.twig', [
            'actualities' => $formr->createView(),
            'buffer'=>true,
            'user'=> $cnm->CheckConnection(),
        ]);
    }
    /**
    * @Route("/recap_actualities_singapore", name="recap_actualities_singapore")
    */
    public function recapActualities(Request $request, ActualitiesManagerSingapore $ams)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        // dd($am->getAllActuAnchor()[$am->paginationAnchor()-($am->paginationAnchor()-1)]->getId());
        //dd($am->countComments($am->paginationAnchor()));
        return $this->render('singapore/home/recap_actualities.html.twig', [
            'articles' => $ams->getAllActu(),
            'buffer'=>$buffer,
            'user'=>$user,
            'id'=>$ams->getAllActu()[0]->getId(),
            'pagination'=>$ams->pagination(),
           // 'count'=>(int)$am->countComments($am->getAllActuAnchor()[$am->paginationAnchor()-($am->paginationAnchor()-1)]->getId()) ,
            ]);
    }
    
    /**
     * @Route("/delete/singapore", name="delete_singapore")
     */
    public function deleteActu(ActualitiesManagerSingapore $ams, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $ams->deleteActu($_GET['val']);
        return $this->redirectToRoute('actualities_singapore');
    }
    /**
     * @Route("/update/actu/select/singapore", name="update_actu_select_singapore")
     */
    public function selectActuToUpdate(ActualitiesManagerSingapore $ams, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        if (!$ams->goToActu($_GET['val'])) {
            return $this->redirectToRoute('update_actu_singapore');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $ams->goToActu($_GET['val'])[3]);
        return $this->redirectToRoute('update_actu_singapore');
    }
    /**
     * @Route("/update/actu/singapore", name="update_actu_singapore")
     */
    public function updateActu(ActualitiesManagerSingapore $ams, Request $request, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $ss=new Session();
        $image= $this->getParameter('upload_directory').'Singapore/'.$ss->get('id').'/image' ;
        $title=$ams->goToActu(''.$ss->get('title').'')[0];
        $content=$ams->goToActu(''.$ss->get('title').'')[1];
        $author=$ams->goToActu(''.$ss->get('title').'')[2];
        $formr = $this->createForm(ActualitiesSingaporeType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $ams->update($form->getTitle(), $form->getContent(), $form->getAuthor(), null);
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/'.$ss->get('id').'', $fileName);
            return $this->redirectToRoute('recap_actualities');
        }
        return $this->render('singapore/home/update_actu.html.twig', [
            'user'=> $cnm->CheckConnection(),
            'buffer'=>true,
            'title'=>$title,
            'content'=>$content,
            'author'=>$author,
            'image'=>$image,
            'update_actu'=>$formr->createView(),
            ]);
    }
    /**
     * @Route("/comment/actu/singapore", name="comment_actu_singapore")
     */
    public function commentActu(ActualitiesManagerSingapore $ams, Request $request)
    {
        $formr = $this->createForm(CommentsSingaporeType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $request->getSession();
        $ss->set('idArticle', $_GET['val']);
        return $this->render('singapore/home/comment_actu.html.twig', [
            'title'=>$ams->getActuToComment($_GET['val'])[0],
            'content'=>$ams->getActuToComment($_GET['val'])[1],
            'author'=>$ams->getActuToComment($_GET['val'])[2],
            'idArticle'=>$_GET['val'],
            'comments'=>$ams->getComments($_GET['val']),
            'comment_actu' => $formr->createView(),
            ]);
    }
    /**
     * @Route("/show/comments/singapore", name="show_comments_singapore")
     */
    public function showComments(ActualitiesManagerSingapore $ams)
    {
        $ss = $this->session;
        return $this->render('singapore/home/show_comments.html.twig', [
         
            'title'=>$ams->getActuToComment($ss->get('idArticle'))[0],
            'content'=>$ams->getActuToComment($ss->get('idArticle'))[1],
            'author'=>$ams->getActuToComment($ss->get('idArticle')),
            'idArticle'=>$ss->get('idArticle'),
            'comments'=>$ams->getComments($ss->get('idArticle')),
        ]);
    }

    /**
     * @Route("/video/singapore", name="video_singapore")
     */
    public function indexV(Request $request, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $form = $this->createForm(VideoSingaporeType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            //dd($vm->getLastVideo()[0]);
            return $this->redirectToRoute('singapore');
        }
       
        return $this->render('singapore/home/video_index.html.twig', [
            'video' => $form->createView(),
            'buffer'=>true,
            'user'=> $cnm->CheckConnection(),
        ]);
    }
    /**
     * @Route("/delete/video/singapore", name="delete_video_singapore")
     */
    public function deleteVideo(VideoManagerSingapore $vms, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $vms->deleteVideo($_GET['val']);
        return $this->redirectToRoute('video_singapore');
    }
    /**
     * @Route("/update/video/select/singapore", name="update_video_select_singapore")
     */
    public function selectVideoToUpdate(VideoManagerSingapore $vms, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $vms->goToVideo($_GET['val']);
        if (!$vms->goToVideo($_GET['val'])) {
            return $this->redirectToRoute('video_singapore');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $vms->goToVideo($_GET['val'])[2]);
        return $this->redirectToRoute('update_video_singapore');
    }
    /**
     * @Route("/live/streaming/singapore", name="live_streaming_singapore")
     */
    public function indexVideoSingaporeLiveStreaming(VideoManagerSingapore $vms)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        //   return $this->redirectToRoute('maintenance_general') ;
        $repo = $this->getDoctrine()->getRepository(VideoSingapore::class);
        $videos = $repo ->findAll() ;
        return $this->render('singapore/home/live_streaming_index.html.twig', [
            'videos' => $vms->getAllVideos(),
             'buffer'=>$buffer,
            'user'=>$user,
            'pagination'=>$vms->pagination(),
        ]);
    }

    /**
     * @Route("/update/video/singapore", name="update_video_singapore")
     */
    public function updateVideo(VideoManagerSingapore $vms, Request $request, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $ss = $this->session;

        $title=$vms->goToVideo(''.$ss->get('title').'')[0];
        $link=$vms->goToVideo(''.$ss->get('title').'')[1];
        $form = $this->createForm(VideoSingaporeType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $vms->update($form->getNormData()->getTitle(), $form->getNormData()->getLink());
            $vms->removeLast($vms->maxId()[0][1]);
            return $this->redirectToRoute('live_streaming_singapore');
        }
        return $this->render('singapore/home/update_video.html.twig', [
            'videos' => $vms->getAllVideos(),
            'user'=> $cnm->CheckConnection(),
            'buffer'=>true,
            'title'=>$title,
            'link'=>$link,
            'update_video'=>$form->createView(),
            ]);
    }
    /**
     * @Route("/comment/video/singapore", name="comment_video_singapore")
     */
    public function commentVideo(VideoManagerSingapore $vms, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(CommentsVideoSingaporeType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $this->session;
        $ss->set('idVideo', $_GET['val']);
        return $this->render('singapore/home/comment_video.html.twig', [
            'comment_video' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
            'title'=>$vms->getVideoToComment($_GET['val'])[0],
            'link'=>$vms->getVideoToComment($_GET['val'])[1],
            'idVideo'=>$_GET['val'],
            'comments'=>$vms->getComments($_GET['val']),
            ]);
    }
    /**
     * @Route("/show/comments/video/singapore", name="show_comments_video_singapore")
     */
    public function showCommentsVideoSingapore(VideoManagerSingapore $vms)
    {
        $ss = $this->session;
        return $this->render('live_streaming/show_comments.html.twig', [
         
            'title'=>$vms->getVideoToComment($ss->get('idVideo'))[0],
            'link'=>$vms->getVideoToComment($ss->get('idVideo'))[1],
            'idVideo'=>$ss->get('idVideo'),
            'comments'=>$vms->getComments($ss->get('idVideo')),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManagerCanada;
use App\Entity\User;
use App\Entity\VideoCanada;
use App\Form\ActualitiesCanadaType;
use App\Form\CommentsCanadaType;
use App\Entity\CommentsCanada;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesCanadaFormHandler;
use App\Handlers\Form\CommentsCanadaFormHandler;
use App\Entity\ActualitiesCanada;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Services\VideoManagerCanada;
use App\Handlers\Form\VideoCanadaFormHandler;
use App\Form\VideoCanadaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use App\Form\CommentsVideoCanadaType;
use App\Entity\CommentsVideoCanada;
use App\Handlers\Form\CommentsVideoFormHandler;

class CanadaController extends AbstractController
{
    private $entityManager;
    private $formHandler;
    private $cfh;
    private $cvsfh;
    private $videoCanadaformHandler;
 
    public function __construct(ActualitiesCanadaFormHandler $formHandler, VideoCanadaFormHandler $videoCanadaformHandler, SessionInterface $session, CommentsVideoFormHandler $cvsfh, CommentsCanadaFormHandler $cfh, EntityManagerInterface $entityManager, Security $security)
    {
        $this->formHandler = $formHandler;
        $this->cfh=$cfh;
        $this->cvsfh=$cvsfh;
        $this->entityManager = $entityManager;
        $this->security = $security;
        $this->session = $session;
        $this->videoCanadaformHandler = $videoCanadaformHandler;
    }
    /**
     * @Route("/Canada", name="canada")
     */
    public function index(ActualitiesManagerCanada $amc, VideoManagerCanada $vmc)
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
        $videoTitle=$vmc->getLastVideo()[0];
        $videoLink= $vmc->getLastVideo()[1];
        if ($amc->getLastActuality()) {
            $lastActuTitle=$amc->getLastActuality()[0];
            $lastActuContent=$amc->getLastActuality()[1];
            $lastActuContent=substr($lastActuContent, 0, 60).'[...]';
            $author=$amc->getLastActuality()[2];
        }
         // return $this->redirectToRoute('maintenance_general') ;
        return $this->render('canada/home/index.html.twig', [
            'lastActuContent' => $lastActuContent,
            'lastActuTitle' => $lastActuTitle,
            'author' => $author,
            'videoLink'=>$videoLink,
            'videoTitle'=>$videoTitle,
            'buffer'=>$buffer,
            'user'=>$user,
            'countComments'=>$amc->countCommentsLastActu(),
            'countCommentsVideo'=>$vmc->countCommentsLastVideo(),
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
    
    /**
     * @Route("/actualities/canada", name="actualities_canada")
     */
    public function index2(Request $request, ActualitiesManagerCanada $amc)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(ActualitiesCanadaType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploadsCanada/'.$amc->maxId()[0][1].'', $fileName);
            return $this->redirectToRoute('recap_actualities_canada');
        }
        return $this->render('canada/home/actualities_canada_admin.html.twig', [
            'actualities' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
    * @Route("/recap_actualities_canada", name="recap_actualities_canada")
    */
    public function recapActualities(Request $request, ActualitiesManagerCanada $amc)
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
        return $this->render('canada/home/recap_actualities.html.twig', [
            'articles' => $amc->getAllActu(),
            'buffer'=>$buffer,
            'user'=>$user,
            'id'=>$amc->getAllActu()[0]->getId(),
            'pagination'=>$amc->pagination(),
           // 'count'=>(int)$am->countComments($am->getAllActuAnchor()[$am->paginationAnchor()-($am->paginationAnchor()-1)]->getId()) ,
            ]);
    }
    
    /**
     * @Route("/delete/canada", name="delete_canada")
     */
    public function deleteActu(ActualitiesManagerCanada $amc)
    {
        $amc->deleteActu($_GET['val']);
        return $this->redirectToRoute('actualities_canada');
    }
    /**
     * @Route("/update/actu/select/canada", name="update_actu_select_canada")
     */
    public function selectActuToUpdate(ActualitiesManagerCanada $amc)
    {
        if (!$amc->goToActu($_GET['val'])) {
            return $this->redirectToRoute('update_actu_canada');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $amc->goToActu($_GET['val'])[3]);
        return $this->redirectToRoute('update_actu_canada');
    }
    /**
     * @Route("/update/actu/canada", name="update_actu_canada")
     */
    public function updateActu(ActualitiesManagerCanada $amc, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $ss=new Session();
        $image= $this->getParameter('upload_directory').'Canada/'.$ss->get('id').'/image' ;
        $title=$amc->goToActu(''.$ss->get('title').'')[0];
        $content=$amc->goToActu(''.$ss->get('title').'')[1];
        $author=$amc->goToActu(''.$ss->get('title').'')[2];
        $formr = $this->createForm(ActualitiesCanadaType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $amc->update($form->getTitle(), $form->getContent(), $form->getAuthor(), null);
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/'.$ss->get('id').'', $fileName);
            return $this->redirectToRoute('recap_actualities');
        }
        return $this->render('canada/home/update_actu.html.twig', [
            'buffer'=>$buffer,
            'user'=>$user,
            'buffer'=>$buffer,
            'title'=>$title,
            'content'=>$content,
            'author'=>$author,
            'image'=>$image,
            'update_actu'=>$formr->createView(),
            ]);
    }
    /**
     * @Route("/comment/actu/canada", name="comment_actu_canada")
     */
    public function commentActu(ActualitiesManagerCanada $amc, Request $request)
    {
        $formr = $this->createForm(CommentsCanadaType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $request->getSession();
        $ss->set('idArticle', $_GET['val']);
        return $this->render('canada/home/comment_actu.html.twig', [
            'title'=>$amc->getActuToComment($_GET['val'])[0],
            'content'=>$amc->getActuToComment($_GET['val'])[1],
            'author'=>$amc->getActuToComment($_GET['val'])[2],
            'idArticle'=>$_GET['val'],
            'comments'=>$amc->getComments($_GET['val']),
            'comment_actu' => $formr->createView(),
            ]);
    }
    /**
     * @Route("/show/comments/canada", name="show_comments_canada")
     */
    public function showComments(ActualitiesManagerCanada $amc)
    {
        $ss = $this->session;
        return $this->render('canada/home/show_comments.html.twig', [
         
            'title'=>$amc->getActuToComment($ss->get('idArticle'))[0],
            'content'=>$amc->getActuToComment($ss->get('idArticle'))[1],
            'author'=>$amc->getActuToComment($ss->get('idArticle')),
            'idArticle'=>$ss->get('idArticle'),
            'comments'=>$amc->getComments($ss->get('idArticle')),
        ]);
    }

    /**
     * @Route("/video/canada", name="video_canada")
     */
    public function indexV(Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $form = $this->createForm(VideoCanadaType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            //dd($vm->getLastVideo()[0]);
            return $this->redirectToRoute('canada');
        }
       
        return $this->render('canada/home/video_index.html.twig', [
            'video' => $form->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/delete/video/canada", name="delete_video_canada")
     */
    public function deleteVideo(VideoManagerCanada $vmc)
    {
        $vmc->deleteVideo($_GET['val']);
        return $this->redirectToRoute('video_canada');
    }
    /**
     * @Route("/update/video/select/canada", name="update_video_select_canada")
     */
    public function selectVideoToUpdate(VideoManagerCanada $vmc)
    {  
        $vmc->goToVideo($_GET['val']);
        if (!$vmc->goToVideo($_GET['val'])) {
            return $this->redirectToRoute('video_canada');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $vmc->goToVideo($_GET['val'])[2]);
        return $this->redirectToRoute('update_video_canada');
    }
    /**
     * @Route("/live/streaming/canada", name="live_streaming_canada")
     */
    public function indexVideoCanadaLiveStreaming(VideoManagerCanada $vmc)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        //   return $this->redirectToRoute('maintenance_general') ;
        $repo = $this->getDoctrine()->getRepository(VideoCanada::class);
        $videos = $repo ->findAll() ;
        return $this->render('canada/home/live_streaming_index.html.twig', [
            'videos' => $vmc->getAllVideos(),
             'buffer'=>$buffer,
            'user'=>$user,
            'pagination'=>$vmc->pagination(),
        ]);
    }

    /**
     * @Route("/update/video/canada", name="update_video_canada")
     */
    public function updateVideo(VideoManagerCanada $vmc, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $ss = $this->session;

        $title=$vmc->goToVideo(''.$ss->get('title').'')[0];
        $link=$vmc->goToVideo(''.$ss->get('title').'')[1];
        $form = $this->createForm(VideoCanadaType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $vmc->update($form->getNormData()->getTitle(), $form->getNormData()->getLink());
            $vmc->removeLast($vmc->maxId()[0][1]);
            return $this->redirectToRoute('live_streaming_canada');
        }
        return $this->render('canada/home/update_video.html.twig', [
            'videos' => $vmc->getAllVideos(),
            'buffer'=>$buffer,
            'user'=>$user,
            'buffer'=>$buffer,
            'title'=>$title,
            'link'=>$link,
            'update_video'=>$form->createView(),
            ]);
    }
    /**
     * @Route("/comment/video/canada", name="comment_video_canada")
     */
    public function commentVideo(VideoManagerCanada $vmc, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(CommentsVideoCanadaType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $this->session;
        $ss->set('idVideo', $_GET['val']);
        return $this->render('canada/home/comment_video.html.twig', [
            'comment_video' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
            'title'=>$vmc->getVideoToComment($_GET['val'])[0],
            'link'=>$vmc->getVideoToComment($_GET['val'])[1],
            'idVideo'=>$_GET['val'],
            'comments'=>$vmc->getComments($_GET['val']),
            ]);
    }
    /**
     * @Route("/show/comments/video/canada", name="show_comments_video_canada")
     */
    public function showCommentsVideoCanada(VideoManagerCanada $vmc)
    {
        $ss = $this->session;
        return $this->render('live_streaming/show_comments.html.twig', [
         
            'title'=>$vmc->getVideoToComment($ss->get('idVideo'))[0],
            'link'=>$vmc->getVideoToComment($ss->get('idVideo'))[1],
            'idVideo'=>$ss->get('idVideo'),
            'comments'=>$vmc->getComments($ss->get('idVideo')),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManagerHongkong;
use App\Entity\User;
use App\Entity\VideoHongkong;
use App\Form\ActualitiesHongkongType;
use App\Form\CommentsHongkongType;
use App\Entity\CommentsHongkong;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesHongkongFormHandler;
use App\Handlers\Form\CommentsHongkongFormHandler;
use App\Entity\ActualitiesHongkong;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Services\VideoManagerHongkong;
use App\Handlers\Form\VideoHongkongFormHandler;
use App\Form\VideoHongkongType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use App\Form\CommentsVideoHongkongType;
use App\Entity\CommentsVideoHongkong;
use App\Handlers\Form\CommentsVideoFormHandler;

class HongKongController extends AbstractController
{
    private $entityManager;
    private $formHandler;
    private $cfh;
    private $cvsfh;
    private $videoHongkongformHandler;
 
    public function __construct(ActualitiesHongkongFormHandler $formHandler, VideoHongkongFormHandler $videoHongkongformHandler, SessionInterface $session, CommentsVideoFormHandler $cvsfh, CommentsHongkongFormHandler $cfh, EntityManagerInterface $entityManager, Security $security)
    {
        $this->formHandler = $formHandler;
        $this->cfh=$cfh;
        $this->cvsfh=$cvsfh;
        $this->entityManager = $entityManager;
        $this->security = $security;
        $this->session = $session;
        $this->videoHongkongformHandler = $videoHongkongformHandler;
    }
    /**
     * @Route("/Hongkong", name="hongkong")
     */
    public function index(ActualitiesManagerHongkong $amhk, VideoManagerHongkong $vmhk)
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
        $videoTitle=$vmhk->getLastVideo()[0];
        $videoLink= $vmhk->getLastVideo()[1];
        if ($amhk->getLastActuality()) {
            $lastActuTitle=$amhk->getLastActuality()[0];
            $lastActuContent=$amhk->getLastActuality()[1];
            $lastActuContent=substr($lastActuContent, 0, 60).'[...]';
            $author=$amhk->getLastActuality()[2];
        }
         // return $this->redirectToRoute('maintenance_general') ;
        return $this->render('hongkong/home/index.html.twig', [
            'lastActuContent' => $lastActuContent,
            'lastActuTitle' => $lastActuTitle,
            'author' => $author,
            'videoLink'=>$videoLink,
            'videoTitle'=>$videoTitle,
            'buffer'=>$buffer,
            'user'=>$user,
            'countComments'=>$amhk->countCommentsLastActu(),
            'countCommentsVideo'=>$vmhk->countCommentsLastVideo(),
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
     * @Route("/actualities/hongkong", name="actualities_hongkong")
     */
    public function index2(Request $request, ActualitiesManagerHongkong $amhk)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(ActualitiesHongkongType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploadsHongkong/'.$amhk->maxId()[0][1].'', $fileName);
            return $this->redirectToRoute('recap_actualities_hongkong');
        }
        return $this->render('hongkong/home/actualities_hongkong_admin.html.twig', [
            'actualities' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
    * @Route("/recap_actualities_hongkong", name="recap_actualities_hongkong")
    */
    public function recapActualities(Request $request, ActualitiesManagerHongkong $amhk)
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
        return $this->render('hongkong/home/recap_actualities.html.twig', [
            'articles' => $amhk->getAllActu(),
            'buffer'=>$buffer,
            'user'=>$user,
            'id'=>$amhk->getAllActu()[0]->getId(),
            'pagination'=>$amhk->pagination(),
           // 'count'=>(int)$am->countComments($am->getAllActuAnchor()[$am->paginationAnchor()-($am->paginationAnchor()-1)]->getId()) ,
            ]);
    }
    
    /**
     * @Route("/delete/hongkong", name="delete_hongkong")
     */
    public function deleteActu(ActualitiesManagerHongkong $amhk)
    {
        $amhk->deleteActu($_GET['val']);
        return $this->redirectToRoute('actualities_hongkong');
    }
    /**
     * @Route("/update/actu/select/hongkong", name="update_actu_select_hongkong")
     */
    public function selectActuToUpdate(ActualitiesManagerHongkong $amhk)
    {
        if (!$amhk->goToActu($_GET['val'])) {
            return $this->redirectToRoute('update_actu_hongkong');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $amhk->goToActu($_GET['val'])[3]);
        return $this->redirectToRoute('update_actu_hongkong');
    }
    /**
     * @Route("/update/actu/hongkong", name="update_actu_hongkong")
     */
    public function updateActu(ActualitiesManagerHongkong $amhk, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $ss=new Session();
        $image= $this->getParameter('upload_directory').'Hongkong/'.$ss->get('id').'/image' ;
        $title=$amhk->goToActu(''.$ss->get('title').'')[0];
        $content=$amhk->goToActu(''.$ss->get('title').'')[1];
        $author=$amhk->goToActu(''.$ss->get('title').'')[2];
        $formr = $this->createForm(ActualitiesHongkongType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $amhk->update($form->getTitle(), $form->getContent(), $form->getAuthor(), null);
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/'.$ss->get('id').'', $fileName);
            return $this->redirectToRoute('recap_actualities');
        }
        return $this->render('hongkong/home/update_actu.html.twig', [
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
     * @Route("/comment/actu/hongkong", name="comment_actu_hongkong")
     */
    public function commentActu(ActualitiesManagerHongkong $amhk, Request $request)
    {
        $formr = $this->createForm(CommentsHongkongType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $request->getSession();
        $ss->set('idArticle', $_GET['val']);
        return $this->render('hongkong/home/comment_actu.html.twig', [
            'title'=>$amhk->getActuToComment($_GET['val'])[0],
            'content'=>$amhk->getActuToComment($_GET['val'])[1],
            'author'=>$amhk->getActuToComment($_GET['val'])[2],
            'idArticle'=>$_GET['val'],
            'comments'=>$amhk->getComments($_GET['val']),
            'comment_actu' => $formr->createView(),
            ]);
    }
    /**
     * @Route("/show/comments/hongkong", name="show_comments_hongkong")
     */
    public function showComments(ActualitiesManagerHongkong $amhk)
    {
        $ss = $this->session;
        return $this->render('hongkong/home/show_comments.html.twig', [
         
            'title'=>$amhk->getActuToComment($ss->get('idArticle'))[0],
            'content'=>$amhk->getActuToComment($ss->get('idArticle'))[1],
            'author'=>$amhk->getActuToComment($ss->get('idArticle')),
            'idArticle'=>$ss->get('idArticle'),
            'comments'=>$amhk->getComments($ss->get('idArticle')),
        ]);
    }

    /**
     * @Route("/video/hongkong", name="video_hongkong")
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
        $form = $this->createForm(VideoHongkongType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            //dd($vm->getLastVideo()[0]);
            return $this->redirectToRoute('hongkong');
        }
       
        return $this->render('hongkong/home/video_index.html.twig', [
            'video' => $form->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/delete/video/hongkong", name="delete_video_hongkong")
     */
    public function deleteVideo(VideoManagerHongkong $vmhk)
    {
        $vmhk->deleteVideo($_GET['val']);
        return $this->redirectToRoute('video_hongkong');
    }
    /**
     * @Route("/update/video/select/hongkong", name="update_video_select_hongkong")
     */
    public function selectVideoToUpdate(VideoManagerHongkong $vmhk)
    {  
        $vmhk->goToVideo($_GET['val']);
        if (!$vmhk->goToVideo($_GET['val'])) {
            return $this->redirectToRoute('video_hongkong');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $vmhk->goToVideo($_GET['val'])[2]);
        return $this->redirectToRoute('update_video_hongkong');
    }
    /**
     * @Route("/live/streaming/hongkong", name="live_streaming_hongkong")
     */
    public function indexVideoHongkongLiveStreaming(VideoManagerHongkong $vmhk)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        //   return $this->redirectToRoute('maintenance_general') ;
        $repo = $this->getDoctrine()->getRepository(VideoHongkong::class);
        $videos = $repo ->findAll() ;
        return $this->render('hongkong/home/live_streaming_index.html.twig', [
            'videos' => $vmhk->getAllVideos(),
             'buffer'=>$buffer,
            'user'=>$user,
            'pagination'=>$vmhk->pagination(),
        ]);
    }

    /**
     * @Route("/update/video/hongkong", name="update_video_hongkong")
     */
    public function updateVideo(VideoManagerHongkong $vmhk, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $ss = $this->session;

        $title=$vmhk->goToVideo(''.$ss->get('title').'')[0];
        $link=$vmhk->goToVideo(''.$ss->get('title').'')[1];
        $form = $this->createForm(VideoHongkongType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $vmhk->update($form->getNormData()->getTitle(), $form->getNormData()->getLink());
            $vmhk->removeLast($vmhk->maxId()[0][1]);
            return $this->redirectToRoute('live_streaming_hongkong');
        }
        return $this->render('hongkong/home/update_video.html.twig', [
            'videos' => $vmhk->getAllVideos(),
            'buffer'=>$buffer,
            'user'=>$user,
            'buffer'=>$buffer,
            'title'=>$title,
            'link'=>$link,
            'update_video'=>$form->createView(),
            ]);
    }
    /**
     * @Route("/comment/video/hongkong", name="comment_video_hongkong")
     */
    public function commentVideo(VideoManagerHongkong $vmhk, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(CommentsVideoHongkongType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $this->session;
        $ss->set('idVideo', $_GET['val']);
        return $this->render('hongkong/home/comment_video.html.twig', [
            'comment_video' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
            'title'=>$vmhk->getVideoToComment($_GET['val'])[0],
            'link'=>$vmhk->getVideoToComment($_GET['val'])[1],
            'idVideo'=>$_GET['val'],
            'comments'=>$vmhk->getComments($_GET['val']),
            ]);
    }
    /**
     * @Route("/show/comments/video/hongkong", name="show_comments_video_hongkong")
     */
    public function showCommentsVideoHongkong(VideoManagerHongkong $vmhk)
    {
        $ss = $this->session;
        return $this->render('live_streaming/show_comments.html.twig', [
         
            'title'=>$vmhk->getVideoToComment($ss->get('idVideo'))[0],
            'link'=>$vmhk->getVideoToComment($ss->get('idVideo'))[1],
            'idVideo'=>$ss->get('idVideo'),
            'comments'=>$vmhk->getComments($ss->get('idVideo')),
        ]);
    }
}

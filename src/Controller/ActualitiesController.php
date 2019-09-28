<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ActualitiesType;
use App\Form\CommentsType;
use App\Entity\Comments;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesFormHandler;
use App\Handlers\Form\CommentsFormHandler;
use App\Entity\Actualities;
use App\Services\ActualitiesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class ActualitiesController extends AbstractController
{
    private $entityManager;
    private $formHandler;
    private $cfh;
   
    public function __construct(ActualitiesFormHandler $formHandler, SessionInterface $session, CommentsFormHandler $cfh, EntityManagerInterface $entityManager, Security $security)
    {
        $this->formHandler = $formHandler;
        $this->cfh=$cfh;
        $this->entityManager = $entityManager;
        $this->security = $security;
        $this->session = $session;
    }
    /**
     * @Route("/actualities", name="actualities")
     */
    public function index(Request $request, ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $formr = $this->createForm(ActualitiesType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/'.$am->maxId()[0][1].'', $fileName);
            return $this->redirectToRoute('recap_actualities_anchor');
        }
        return $this->render('actualities/index.html.twig', [
            'actualities' => $formr->createView(),
            'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
    * @Route("/recap_actualities_anchor", name="recap_actualities_anchor")
    */
    public function recapActualitiesAnchor(Request $request, ActualitiesManager $am)
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
        return $this->render('actualities/recap_actualities_anchor.html.twig', [
            'articles' => $am->getAllActuAnchor(),
            'buffer'=>$buffer,
            'user'=>$user,
            'id'=>$am->getAllActuAnchor()[0]->getId(),
            'paginationAnchor'=>$am->paginationAnchor(),
           // 'count'=>(int)$am->countComments($am->getAllActuAnchor()[$am->paginationAnchor()-($am->paginationAnchor()-1)]->getId()) ,
            ]);
    }
    /**
    * @Route("/recap_actualities_dailyGolspels", name="recap_actualities_dailyGospels")
    */
    public function recapActualitiesDailyGospels(Request $request, ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('actualities/recap_actualities_dailyGospels.html.twig', [
            'articles' => $am->getAllActuDailyGospels(),
            'buffer'=>$buffer,
            'user'=>$user,
            'paginationDailyGospels'=>$am->paginationDailyGospels(),
            ]);
    }
    /**
    * @Route("/recap_actualities_st_of_day", name="recap_actualities_st_of_day")
    */
    public function recapActualitiesStOfDay(Request $request, ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('actualities/recap_actualities_st_of_day.html.twig', [
            'articles' => $am->getAllActuStOfDay(),
            'buffer'=>$buffer,
            'user'=>$user,
            'paginationStOfDay'=>$am->paginationStOfDay(),
            ]);
    }
    /**
    * @Route("/recap_actualities_radio_prog", name="recap_actualities_radio_prog")
    */
    public function recapActualitiesRadioProg(Request $request, ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('actualities/recap_actualities_radio_prog.html.twig', [
            'articles' => $am->getAllActuRadioProg(),
            'buffer'=>$buffer,
            'user'=>$user,
            ]);
    }
    /**
    * @Route("/recap_actualities_tv_prog", name="recap_actualities_tv_prog")
    */
    public function recapActualitiesTVProg(Request $request, ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('actualities/recap_actualities_tv_prog.html.twig', [
            'articles' => $am->getAllActuTVProg(),
            'buffer'=>$buffer,
            'user'=>$user,
            ]);
    }
    /**
    * @Route("/recap_actualities_uyas", name="recap_actualities_uyas")
    */
    public function recapActualitiesUyas(Request $request, ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('actualities/recap_actualities_uyas.html.twig', [
            'articles' => $am->getAllActuUyas(),
            'buffer'=>$buffer,
            'user'=>$user,
            ]);
    }
    /**
     * @Route("/delete", name="delete")
     */
    public function deleteActu(ActualitiesManager $am)
    {
        $am->deleteActu($_GET['val']);
        return $this->redirectToRoute('actualities');
    }
    /**
     * @Route("/update/actu/select", name="update_actu_select")
     */
    public function selectActuToUpdate(ActualitiesManager $am)
    {
        if (!$am->goToActu($_GET['val'])) {
            return $this->redirectToRoute('actualities');
        }
        $ss=new Session();

        $ss->set('title', $_GET['val']);
        $ss->set('id', $am->goToActu($_GET['val'])[3]);
        return $this->redirectToRoute('update_actu');
    }
    /**
     * @Route("/update/actu", name="update_actu")
     */
    public function updateActu(ActualitiesManager $am, Request $request)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        $ss=new Session();
        $image= $this->getParameter('upload_directory').'/'.$ss->get('id').'/image' ;
        $title=$am->goToActu(''.$ss->get('title').'')[0];
        $content=$am->goToActu(''.$ss->get('title').'')[1];
        $author=$am->goToActu(''.$ss->get('title').'')[2];
        $formr = $this->createForm(ActualitiesType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $am->update($form->getTitle(), $form->getContent(), $form->getAuthor(), null, $form->getType());
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/'.$ss->get('id').'', $fileName);
            return $this->redirectToRoute('recap_actualities_anchor');
        }
        return $this->render('actualities/update_actu.html.twig', [
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
     * @Route("/comment/actu", name="comment_actu")
     */
    public function commentActu(ActualitiesManager $am, Request $request)
    {
        $formr = $this->createForm(CommentsType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
        }
        $ss = $request->getSession();
        $ss->set('idArticle', $_GET['val']);
        return $this->render('actualities/comment_actu.html.twig', [
            'title'=>$am->getActuToComment($_GET['val'])[0],
            'content'=>$am->getActuToComment($_GET['val'])[1],
            'author'=>$am->getActuToComment($_GET['val'])[2],
            'idArticle'=>$_GET['val'],
            'comments'=>$am->getComments($_GET['val']),
            'comment_actu' => $formr->createView(),
            ]);
    }
    /**
     * @Route("/show/comments", name="show_comments")
     */
    public function showComments(ActualitiesManager $am)
    {
        $ss = $this->session;
        return $this->render('actualities/show_comments.html.twig', [
         
            'title'=>$am->getActuToComment($ss->get('idArticle'))[0],
            'content'=>$am->getActuToComment($ss->get('idArticle'))[1],
            'author'=>$am->getActuToComment($ss->get('idArticle')),
            'idArticle'=>$ss->get('idArticle'),
            'comments'=>$am->getComments($ss->get('idArticle')),
        ]);
    }
}

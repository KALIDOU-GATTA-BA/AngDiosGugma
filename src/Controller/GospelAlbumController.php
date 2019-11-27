<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\GospelAlbumType;
use App\Form\CommentsType;
use App\Entity\Comments;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesFormHandler;
use App\Handlers\Form\CommentsFormHandler;
use App\Entity\GospelAlbum;
use App\Services\ActualitiesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use App\Services\CheckConnectionManager;
use App\Services\GospelAlbumManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

//'controller_name' => 'GospelAlbumController',

class GospelAlbumController extends AbstractController
{
   
	public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }
    /**
     * @Route("/gam", name="gam")
     */
    public function index(Request $request, GospelAlbumManager $gam, CheckConnectionManager $cnm)
    {
        $cnm->CheckConnection();
        $cnm->roleAdmin();
        $admin=$cnm->CheckConnection();
        switch ($admin) {
            case 'Elva':
               $admin='Sis. Elva Montales';
               break;
            case 'Shandy':
               $admin='Sis. Mary Shandy Daulo';
               break;
            case 'ninoyJ':
               $admin='Bro. Ninoy';
               break;
            case 'arielSteve':
               $admin='Bro. Ariel Steve';
               break;
           case 'Mary Jane':
               $admin='Sis. Mary Jane';
               break;
           default:
               $admin='ADG';
               break;
       }
        $formr = $this->createForm(GospelAlbumType::class)->handleRequest($request);
        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploads/gospel/album/'.$gam->maxId()[0][1].'', $fileName);
            $gam->removePhoto(12);
            return $this->redirectToRoute('gospel_album');
        }
         
        return $this->render('gospel_album/index.html.twig', [
            'gam' => $formr->createView(),
            'buffer'=>true,
            'user'=>$cnm->CheckConnection(),
            'admin'=>$admin,
        ]);
    }
    /**
    * @Route("/gospel/album", name="gospel_album")
    */
    public function recapGospelAlbum(Request $request, GospelAlbumManager $gam)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
       // dd($gam->getAllGospelAlbum());

        return $this->render('gospel_album/recap_gospel_album.html.twig', [
            'gams' => $gam->getAllGospelAlbum(),
            'buffer'=>$buffer,
            'user'=>$user,
            'id'=>$gam->getAllGospelAlbum()[0]->getId(),
            //'paginationAnchor'=>$gam->paginationAnchor(),
            ]);
    }
    /**
    * @Route("/gospel/album/remove", name="gospel_album_remove")
    */
    public function removePhoto( GospelAlbumManager $gam)
    {
    	$gam->removePhoto($_GET['val']);
    	$this->redirectToRoute('gospel_album');
    	return $this->render('gospel_album/remove.html.twig');
    }

}
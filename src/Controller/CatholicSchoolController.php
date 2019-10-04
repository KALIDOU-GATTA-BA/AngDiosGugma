<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;
use App\Services\VideoManager;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CatholicSchoolActuType;
use App\Form\CatholicSchoolVideoType;
use App\Entity\User;
use App\Services\CheckConnectionManager;

class CatholicSchoolController extends AbstractController
{
    private $entityManager;
    private $security;
   
    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
    }
    /**
    * @Route("/ADG/school/act", name="adg_school_act")
    */
    public function indexActu(Request $request, ActualitiesManager $am, CheckConnectionManager $cnm)
    {
        $cnm->checkConnection();
        $formr = $this->createForm(CatholicSchoolActuType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            $fileName = 'image';
            $formr['image']->getData()->move('uploadsADG/'.$am->maxIdADG()[0][1].'', $fileName);
            return $this->redirectToRoute('catholic_school_actu');
        }

        return $this->render('catholic_school/indexActu.html.twig', [
            'actualities' => $formr->createView(),
            'buffer'=>true,
            'user'=>$cnm->checkConnection(),
        ]);
    }
    /**
    * @Route("/ADG/school/vid", name="adg_school_vid")
    */
    public function indexVideo(Request $request, ActualitiesManager $am, CheckConnectionManager $cnm)
    {
        $cnm->checkConnection();
        $formr = $this->createForm(CatholicSchoolVideoType::class)->handleRequest($request);

        if ($formr->isSubmitted() && $formr->isValid()) {
            $form = $formr->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            return $this->redirectToRoute('catholic_school_video');
        }
        return $this->render('catholic_school/indexVideo.html.twig', [
            'video' => $formr->createView(),
            'buffer'=>true,
            'user'=>$cnm->checkConnection(),
        ]);
    }

    /**
     * @Route("/catholic/school/actu", name="catholic_school_actu")
     */
    public function recapActuSchool(ActualitiesManager $am)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('catholic_school/recapActuSchool.html.twig', [
            'controller_name' => 'CatholicSchoolController',
            'buffer'=>$buffer,
            'user'=>$user,
            'articles' => $am->getAllActuADGSchool(),
            'id'=>$am->getAllActuADGSchool()[0]->getId(),

        ]);
    }
    /**
     * @Route("/catholic/school/video", name="catholic_school_video")
     */
    public function recapVideoSchool(VideoManager $vm)
    {
        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }
        return $this->render('catholic_school/recapVideoSchool.html.twig', [
            'controller_name' => 'CatholicSchoolController',
            'buffer'=>$buffer,
            'user'=>$user,
            'videos'=>$vm->getAllVideoADGSchool(),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CommunityInc;

class RecapComIncController extends AbstractController
{
    /**
     * @Route("/recap/com/inc", name="recap_com_inc")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(CommunityInc::class);
        $articles = $repo ->findAll() ;
        
        return $this->render('recap_com_inc/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' =>$articles
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Antique;


class RecapAntiqueController extends AbstractController
{
   /**
     * @Route("/recap/antique", name="recap_antique")
     */
    public function index()
    {
    	$repo = $this->getDoctrine()->getRepository(Antique::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_antique/index.html.twig', [
            'articles' =>$articles
        ]);  
    }
}

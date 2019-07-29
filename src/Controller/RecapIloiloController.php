<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Iloilo;

class RecapIloiloController extends AbstractController
{
    /**
     * @Route("/recap/iloilo", name="recap_iloilo")
     */
    public function index()
    {
    	$repo = $this->getDoctrine()->getRepository(Iloilo::class);
        $articles = $repo ->findAll() ;
        
        return $this->render('recap_iloilo/index.html.twig', [
            'articles' =>$articles
        ]);  
    }
}

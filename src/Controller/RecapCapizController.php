<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Capiz;


class RecapCapizController extends AbstractController
{
    /**
     * @Route("/recap/capiz", name="recap_capiz")
     */
    public function index()
    {
    	$repo = $this->getDoctrine()->getRepository(Capiz::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_capiz/index.html.twig', [
            'articles' =>$articles
        ]);  
    }
}

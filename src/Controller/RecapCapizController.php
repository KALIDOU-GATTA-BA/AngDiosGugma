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
        /*$repo = $this->getDoctrine()->getRepository(Capiz::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_capiz/index.html.twig', [
            'articles' =>$articles
        ]);  */

        $repo = $this->getDoctrine()->getRepository(Capiz::class);
        $articles = $repo ->findAll() ;
        $articles1=$articles[0];
        $articles2=$articles[1];
        $articles3=$articles[2];
        $articles4=$articles[3];
        $articles5=$articles[4];
        $articles6=$articles[5];

        return $this->render('recap_capiz/index.html.twig', [
            'article1' => $articles1,
            'article2' => $articles2,
            'article3' => $articles3,
            'article4' => $articles4,
            'article5' => $articles5,
            'article6' => $articles6,
            ]);
    }
}

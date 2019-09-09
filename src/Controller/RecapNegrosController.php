<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Negros;

class RecapNegrosController extends AbstractController
{
    /**
     * @Route("/recap/negros", name="recap_negros")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Negros::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_negros/index.html.twig', [
            'articles' => $articles,
            ]);
    }
}

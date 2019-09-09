<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Mindanao;

class RecapMindanaoController extends AbstractController
{
    /**
     * @Route("/recap/mindanao", name="recap_mindanao")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Mindanao::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_mindanao/index.html.twig', [
            'articles' => $articles,
            ]);
    }
}

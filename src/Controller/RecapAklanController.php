<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Aklan;

class RecapAklanController extends AbstractController
{
    /**
     * @Route("/recap/aklan", name="recap_aklan")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Aklan::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_aklan/index.html.twig', [
            'articles' => $articles,
            ]);
    }
}

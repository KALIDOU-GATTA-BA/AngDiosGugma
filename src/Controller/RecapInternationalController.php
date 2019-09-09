<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\International;

class RecapInternationalController extends AbstractController
{
    /**
     * @Route("/recap/international", name="recap_international")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(International::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_international/index.html.twig', [
            'articles' => $articles,
            ]);
    }
}

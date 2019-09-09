<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Guimaras;

class RecapGuimarasController extends AbstractController
{
    /**
     * @Route("/recap/guimaras", name="recap_guimaras")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Guimaras::class);
        $articles = $repo ->findAll() ;
        return $this->render('recap_guimaras/index.html.twig', [
            'articles' => $articles,
            ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;

class MoreController extends AbstractController
{
    
    /**
     * @Route("/more/gospels", name="more_gospels")
     */
    public function moreActuGospels(ActualitiesManager $am)
    {
        return $this->render('more/actu_gospel.html.twig', [
            'more'=>array_reverse($am->moreGospels()),
        ]);
    }

    /**
     * @Route("/more/saints", name="more_saints")
     */
    public function moreActuSaint(ActualitiesManager $am)
    {
        return $this->render('more/actu_saint.html.twig', [
            'more'=>array_reverse($am->moreSaints()),
        ]);
    }

    /**
     * @Route("/more/anchors", name="more_anchors")
     */
    public function moreAnchors(ActualitiesManager $am)
    {
        return $this->render('more/actu_anchor.html.twig', [
            'more'=>array_reverse($am->moreAnchors()),
        ]);
    }

    /**
     * @Route("/more/video", name="more_video")
     */
    public function moreVideo()
    {
        return $this->render('more/video.html.twig', [

        ]);
    }
}

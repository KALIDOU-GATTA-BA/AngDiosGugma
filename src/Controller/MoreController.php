<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ActualitiesManager;
use App\Services\VideoManager;

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
     * @Route("/more/videos", name="more_videos")
     */
    public function moreVideos(VideoManager $vm)
    {
        $i=[];
        $j=0;
        foreach ($vm->moreVideos() as $key) {
            $j++;
            $i[$j]=$key->getTitle();
        }

        return $this->render('more/video.html.twig', [
            'more'=> $i,
        ]);
    }
    /**
     * @Route("/show", name="show_more_video")
     */
    public function showMoreVideo(VideoManager $vm)
    {
        return $this->render('more/show_more_video.html.twig', [
            'videoTitle'=> $vm->showMoreVideo($_GET['index'])[0]->getTitle(),
            'videoLink'=> $vm->showMoreVideo($_GET['index'])[0]->getLink(),
        ]);
    }
}

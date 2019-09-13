<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\VideoManager;
use App\Entity\Video;

class LiveStreamingController extends AbstractController
{
    /**
     * @Route("/live/streaming", name="live_streaming")
     */
    public function index(VideoManager $vm)
    {
        $repo = $this->getDoctrine()->getRepository(Video::class);
        $videos = $repo ->findAll() ;
        return $this->render('live_streaming/index.html.twig', [
            'videos' => $videos,
        ]);
    }
}

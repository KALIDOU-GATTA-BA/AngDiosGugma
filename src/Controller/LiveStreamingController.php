<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\VideoManager;
use App\Entity\Video;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;

class LiveStreamingController extends AbstractController
{
    public function __construct(Security $security)
    {
       
        $this->security = $security;
    }
    /**
     * @Route("/live/streaming", name="live_streaming")
     */
    public function index(VideoManager $vm)
    {

        $user='';
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $user=new User();  
            $user = $this->getUser()->getUsername();
            $buffer=true;
        }

        $repo = $this->getDoctrine()->getRepository(Video::class);
        $videos = $repo ->findAll() ;
        return $this->render('live_streaming/index.html.twig', [
            'videos' => $vm->getAllVideos(),
             'buffer'=>$buffer,
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/live/maintenanceSTOP", name="live_maintenance")
     */
    public function maintenance()
    {
        return $this->render('live_streaming/maintenance.html.twig', [
            'videos' => '',
        ]);
    }
}

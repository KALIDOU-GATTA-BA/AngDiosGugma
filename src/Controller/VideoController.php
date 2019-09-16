<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use App\Handlers\Form\VideoFormHandler;
use App\Entity\Video;
use App\Services\VideoManager;

class VideoController extends AbstractController
{
    private $formHandler;
    
    /**
     * @var ContactFormHandler
     */
    public function __construct(VideoFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }

    /**
     * @Route("/video", name="video")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(VideoType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            //dd($vm->getLastVideo()[0]);
            return $this->redirectToRoute('home');
        }
       
        return $this->render('video/index.html.twig', [
            'video' => $form->createView(),
        ]);
    }
    /**
     * @Route("/delete/video", name="delete_video")
     */
    public function deleteVideo(VideoManager $vm)
    {
        $vm->deleteVideo($_GET['val']);
        return $this->redirectToRoute('video');
    }
}

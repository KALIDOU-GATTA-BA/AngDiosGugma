<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ActualitiesType;
use App\Repository\ActualitiesRepository;
use App\Handlers\Form\ActualitiesFormHandler;
use App\Entity\Actualities;

class ActualitiesController extends AbstractController
{

	 private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(ActualitiesFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/actualities", name="actualities")
     */
    public function index(Request $request)
    {
       

    	$image=new Actualities();

        $form = $this->createForm(ActualitiesType::class, $image)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
        	$file=$image->getImage();
        	$imageName =md5(uniqid()) .".".$file->guessExtension();
        	$file->moveb($this->getParameter('upload_directory', $imageName));
        		$image->setImage($imageName);
            return $this->redirectToRoute('home');
        }
       
         return $this->render('actualities/index.html.twig', [
            'actualities' => $form->createView(),
        ]);
    }
}

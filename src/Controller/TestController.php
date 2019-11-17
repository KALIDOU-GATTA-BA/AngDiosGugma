<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\GeolocalisationManager;


class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function getLocalisation(GeolocalisationManager $glm)
    {
    	$glm->getLocalisation(48.913945,2.3268777,'GOOGLEMAP',"AIzaSyBplNoUjYJSMG8eJmfCjq29cwAIj9Ixekw");
    
        return $this->render('test/index.html.twig', [
            'controller_name' => $glm->getLocalisation(48.913945,2.3268777,'GOOGLEMAP',"AIzaSyBplNoUjYJSMG8eJmfCjq29cwAIj9Ixekw"),
        ]);
    }
}

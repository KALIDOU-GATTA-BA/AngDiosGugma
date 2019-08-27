<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Handlers\Form\CommunityIncFormHandler;

use App\Form\CommunityIncType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\CommunityIncRepository;

class CommunityIncController extends AbstractController
{
    private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(CommunityIncFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/community/inc", name="community_inc")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(CommunityIncType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('recap_com_inc');
        }
        return $this->render('community_inc/index.html.twig', [
                           'cominc' => $form->createView(),
                      ]);
    }
}

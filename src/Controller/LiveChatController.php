<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LiveChatMaintenanceRepository;
use App\Handlers\Form\LiveChatMaintenanceFormHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\LiveChatMaintenanceType;





class LiveChatController extends AbstractController
{
	private $formHandler;
    /**
     * @var ContactFormHandler
     */
    public function __construct(LiveChatMaintenanceFormHandler $formHandler)
    {
        $this->formHandler = $formHandler;
    }
    /**
     * @Route("/live/chat", name="live_chat")
     */
    public function maintenance(Request $request)
    {

    	$form = $this->createForm(LiveChatMaintenanceType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            return $this->redirectToRoute('home');
        }
        return $this->render('live_chat/maintenance.html.twig', [
            'liveChatMaintenance' => $form->createView(),
        ]);
    }
}

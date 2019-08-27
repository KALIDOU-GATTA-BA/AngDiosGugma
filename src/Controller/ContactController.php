<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Handlers\Form\ContactFormHandler;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Services\ContactManager;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ContactRepository;
use App\Mailer\Mailer;

class ContactController extends AbstractController
{
    private $formHandler;
    private $mailer;

    /**
     * @var ContactFormHandler
     */
    public function __construct(Mailer $mailer, ContactFormHandler $formHandler)
    {
        $this->mailer = $mailer;
        $this->formHandler = $formHandler;
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, ContactRepository $manager, \Swift_Mailer $mailer, ContactManager $cm)
    {
        $form = $this->createForm(ContactType::class)->handleRequest($request);
        if ($this->formHandler->handle($form)) {
            $this->mailer->send2($cm);
        }

        // return $this->redirectToRoute('home');
        return $this->render('contact/index.html.twig', [
            'contact' => $form->createView(),
        ]);
    }
}

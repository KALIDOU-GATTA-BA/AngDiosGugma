<?php

namespace App\Mailer;

use App\Services\ContactManager;
use Twig\Environment;

class Mailer
{
    /**
     * @var \Swift_Mailer
     */
    private $swiftMailer;
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(\Swift_Mailer $swiftMailer, Environment $twig)
    {
        $this->swiftMailer = $swiftMailer;
        $this->twig = $twig;
    }


    public function send2(ContactManager $cm)
    {
        $this->swiftMailer->send($cm->sendMessage()
                                    ->setBody(
                                        $this->twig->render(
                                            'emails/contact.html.twig',
                                            ['contact_name' => $cm->sql()[2],
                                            'contact_email' => $cm->sql()[4],
                                            'contact_phoneNumber' => $cm->sql()[0],
                                            'contact_message' => $cm->sql()[1],
                                            ]
                                        ),
                                        'text/html'
                    ));
    }
}

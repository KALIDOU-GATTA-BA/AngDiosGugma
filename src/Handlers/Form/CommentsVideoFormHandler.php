<?php

namespace App\Handlers\Form;

use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Comments;
use App\Entity\CommentsVideo;
use Symfony\Component\Form\CommentsType;
use Symfony\Component\Form\CommentsVideoType;

class CommentsVideoFormHandler
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            $this->entityManager->persist($form);
            $this->entityManager->flush();
            
            return true;
        }
    }
}

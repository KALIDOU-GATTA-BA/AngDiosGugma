<?php

namespace App\Handlers\Form;

use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\ActualitiesHongkong;
use Symfony\Component\Form\ActualitiesHongkongType;

class ActualitiesHongkongFormHandler
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $formr = $form->getData();
            $this->entityManager->persist($formr);
            $this->entityManager->flush();
            
            return true;
        }
    }
}

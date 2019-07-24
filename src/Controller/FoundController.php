<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\TeachersManager;

class FoundController extends AbstractController
{
    /**
     * @Route("/found", name="found")
     */
    public function index(TeachersManager $tm)
    {
        $fn=$tm->getAllTeacherData()[0];
        $ln=$tm->getAllTeacherData()[1];

        return $this->render('found/index.html.twig', [
            'fn' => $fn,
            'ln' => $ln,
        ]);
    }
}

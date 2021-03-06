<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    /**
     * @Route("/history", name="about_us")
     */
    public function index()
    {
        return $this->render('about_us/index.html.twig', [
            'controller_name' => 'AboutUsController',
        ]);
    }
    /*
     composer create-project symfony/website-skeleton my_project_name

    <form action="test.php" method="get">
        <div>
            <label for="store">store :</label>
            <input type="number" id="name" name="store">
        </div>
        <div>
            <label for="region">region :</label>
            <input type="number" id="name" name="region">
        </div>
        <input type='submit' value='Go' />

    </form>

*/
}

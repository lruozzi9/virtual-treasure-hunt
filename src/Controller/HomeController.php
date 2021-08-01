<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="app_homepage")
     */
    public function showAction(): Response
    {
        return $this->render('home/home.html.twig');
    }
}
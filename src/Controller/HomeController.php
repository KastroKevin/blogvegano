<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/contactanos", name="contactanos")
     */
    public function contactanos()
    {
        return $this->render('home/contactanos.html.twig');
    }

    /**
     * @Route("/sabermas", name="saber_mas")
     */
    public function saberMas()
    {
        return $this->render('home/saber_mas.html.twig');
    }
}
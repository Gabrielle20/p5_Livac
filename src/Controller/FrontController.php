<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="front")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);

        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }


    /**
     * @Route("/", name="home")
     */

    public function home() {
        return $this->render('front/home.html.twig');
    }


    /**
     * @Route("front/12", name="front_show")
     */

    public function show() {
        return $this->render('front/show.html.twig');
    }
}

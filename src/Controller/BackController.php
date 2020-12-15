<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Article;
use App\Repository\ArticleRepository;

class BackController extends AbstractController
{
    /**
     * @Route("/back", name="back")
     */
    public function index(): Response
    {
        return $this->render('back/index.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }

    // /**
    //  * @Route("/", name="login")
    //  */
    // public function login() {
    //     return $this->render('back/login.html.twig');
    // }

    /**
     * @Route("/back/articles", name="back_liste_articles")
     */
    public function getBackListArticles(ArticleRepository $repo) {

        $articles = $repo->findAll();

        return $this->render('back/articles.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/back/{id}", name="back_show")
     */
    public function show(Article $article) {

        return $this->render('back/show.html.twig', ['article' => $article]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Repository\ArticleRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function index(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();

        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/{id}", name="show_article")
     */
    public function show(Article $article) {
        // $comment = new Comment();

        // $form = $this->createformBuilder($comment)
        //              ->add('author')
        //              ->add('content')
        //              ->getForm();

        return $this->render('back/show.html.twig', [
            'article' => $article,
            // 'form'    => $form->createView()
        ]);
    }
}

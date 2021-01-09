<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Repository\ArticleRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/article/{id}", name="show")
     */
    public function show(Article $monArticle, Request $request, EntityManagerInterface $manager) {
        $comment = new Comment();

        $form = $this->createFormBuilder($comment)
                     ->add('author')
                     ->add('content')
                     ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime());
            $comment->setArticle($monArticle);

            $manager->persist($comment);
            $manager->flush($comment);
        }

        return $this->render('back/show.html.twig', [
            'article'        => $monArticle,
            'formComment'    => $form->createView(),
            'comment'        => $comment
        ]);
    }
}

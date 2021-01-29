<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Repository\ArticleRepository;

use App\Repository\CategoryRepository;
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
    public function index(ArticleRepository $articleRepo, CategoryRepository $repo, EntityManagerInterface $manager): Response
    {
        //SIDE LAST ARTICLES
        $queryArticles = $manager->createQuery('SELECT a.id, a.title, a.author, a.entete, a.createdAt FROM App\Entity\Article a ORDER BY a.id DESC');
        $lastTenArticles = $queryArticles->getResult();

        //SIDE CATEGORIES  
        $allCategories = $repo->findAll();

        //MAIN
        $articles = $articleRepo->findAll();

        //MAIN À LA UNE
        $querySectionUne = $manager->createQuery('SELECT a.title, a.author, a.entete, a.createdAt FROM App\Entity\Article a');
        $sectionUne = $querySectionUne->getResult();


        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'articles' => $articles,
            'lastTenArticles' => $lastTenArticles,
            'allCategories' => $allCategories,
            'sectionUne' => $sectionUne
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


    /**
     * @Route("/api/news", name="api_news")
     */
    public function getNewsFromApi(APINews $apiNews, Request $request, EntityManagerInterface $manager) {
        // Se connecte à Doctrine
        // Regarde si les infos sont trop vielles, si oui
        // Récupère les nouvelles
        // Enregistre les nouvelles infos dans Doctrine
    }
}

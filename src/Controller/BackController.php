<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Article;
use App\Entity\Category;

use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/out", name="out")
     */
    public function out() {
        return $this->render('out.html.twig');
    }

    /**
     * @Route("/back/category", name="back_category")
     */

    public function manageCategory(Request $request, EntityManagerInterface $manager) {
        $category = new Category();

        $form = $this->createFormBuilder($category)
                     ->add('title')
                     ->add('description')
                     ->add('articles')
                     ->getForm();

        return $this->render('back/category.html.twig');
    }


    
    /**
     * @Route("/back/articles", name="back_liste_articles")
     */
    public function getBackListArticles(ArticleRepository $repo) {
        $articles = $repo->findAll();

        return $this->render('back/articles.html.twig', ['articles' => $articles]);
    }
    

    /**
     * @Route("/back/new", name="back_create")
     * @Route("/back/{id}/edit", name="back_edit")
     */
    public function form(Article $article = null, Request $request, EntityManagerInterface $manager) {
        
        if(!$article) {
            $article = new Article();
        }


        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$article->getId()) {
                $article->setCreatedAt(new \DateTime());
            }
            $article->setAuteur('Gabrielle');


            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('back_show', ['id' => $article->getId()]);
        }

        return $this->render('back/create.html.twig', [
            'formArticle' => $form->createView(),
            'editMode' => $article->getId() !== null
        ]);
    }


    /**
     * @Route("/back/{id}", name="back_show")
     */
    public function show(Article $article) {

        return $this->render('back/show.html.twig', ['article' => $article]);
    }

}

<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Article;
use App\Entity\Category;

use App\Form\ArticleType;
use App\Form\CategoryType;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
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

        $lastTen = $articles->getLastTenArticles();
        dd($articles->getLastTenArticles());
        return $this->render('back/articles.html.twig', ['articles' => $articles, 'lastTen' => $lastTen]);
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
     * @Route("/back/{id}/delete", name="back_delete")
     */
    public function delete(Article $article = null, Request $request, EntityManagerInterface $manager) {
        $article = new Article();
        $article = $manager->getRepository(Article::class, $article)->find($id);

        $manager->remove($article);
        $manager->flush();

        return $this->renderToRoute('back/articles.html.twig', [
            'id' => $article->getId()
        ]);

    }





    /**
     * @Route("/back/category", name="back_category")
     */
    public function category(Category $category = null, Request $request, EntityManagerInterface $manager,
    CategoryRepository $repo, ArticleRepository $articleRepo) {
        $category = new Category();

        $form = $this->createFormBuilder($category)
                     ->add('title')
                     ->getForm();

        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($category);
            $manager->flush();

            return $this->redirectToRoute('back_category');
        }

        $category = $repo->findAll();

        // $categoryName = $repo->getId($category);

        // foreach($categoryName as $categoryName) {
            $totalArticles = $articleRepo->createQueryBuilder("article")->select('count(article.category)')
                                         ->getQuery()
                                         ->getSingleScalarResult();
        // }
        
        
        
        return $this->render('back/category.html.twig', [
            'formCategory' => $form->createView(),
            'category'     => $category,
            'totalCategories' => $totalArticles
        ]);

    }




    /**
     * @Route("back/category/{id}/edit", name="back_edit_category")
     */
    public function editCategory(Category $category, ArticleRepository $articleRepo,
    Request $request, EntityManagerInterface $manager) {
        $form = $this->createFormBuilder($category)
                     ->add('title')
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($category);
            $manager->flush();

            return $this->redirectToRoute('back_category');
        }

        $listArticles = $articleRepo->createQueryBuilder("article")->select('article.title')
                                    ->getQuery();
                                    

        return $this->render('back/editCategory.html.twig', [
            'formCategory' => $form->createView(),
            'listArticles' => $listArticles
        ]);

    }






    /**
     * @Route("/back/{id}", name="back_show")
     */
    public function show(Article $article) {

        return $this->render('back/show.html.twig', ['article' => $article]);
    }

}

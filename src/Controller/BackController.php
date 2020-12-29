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
    public function index(EntityManagerInterface $manager, CategoryRepository $repo): Response
    {
        $queryArticles = $manager->createQuery('SELECT a.title, a.author, a.entete, a.createdAt FROM App\Entity\Article a ORDER BY a.id DESC');
        $lastTenArticles = $queryArticles->getResult();
        // dd($lastTenArticles);

        $allCategories = $repo->findAll();

        return $this->render('back/index.html.twig', [
            'controller_name' => 'BackController',
            'lastTenArticles' => $lastTenArticles,
            'allCategories'   => $allCategories
        ]);
    }





    /**
     * @Route("/out", name="out")
     */
    public function out() {
        return $this->render('out.html.twig');
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
        // $article = new Article();
        // $article = $manager->getRepository(Article::class, $article)->find($id);

        // $manager->remove($article);
        // $manager->flush();

        $delete = $manager->createQuery('DELETE a.id FROM App\Entity\Article a');
        $deleted = $query->getResult();

        return $this->renderToRoute('back/articles.html.twig', [
            // 'id' => $article->getId()
            'deleted' =>$deleted
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


        $listArticlesPerCategory = $articleRepo->createQueryBuilder("article")
                                                ->select('a.title')
                                                ->from('article', 'a')
                                                ->getQuery();
                                    
        // $listArticlesPerCategory->handleRequest($request);

        return $this->render('back/editCategory.html.twig', [
            'formCategory' => $form->createView(),
            'listArticlesPerCategory' => $listArticlesPerCategory
        ]);

    }





    /**
     * @Route("/back/{id}", name="back_show")
     */
    public function show(Article $article) {

        return $this->render('back/show.html.twig', ['article' => $article]);
    }

}

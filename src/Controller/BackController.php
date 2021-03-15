<?php

namespace App\Controller;

use App\Entity\Users;

use App\Entity\Article;

use App\Entity\Comment;
use App\Entity\Section;
use App\Entity\Category;

use App\Form\ArticleType;
use App\Form\CategoryType;

use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\SectionRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class BackController extends AbstractController
{

    /**
     * @Route("/back", name="back")
     */
    public function index(EntityManagerInterface $manager, CategoryRepository $repo): Response
    {
        $queryArticles = $manager->createQuery('SELECT a.id, a.title, a.author, a.entete, a.createdAt FROM App\Entity\Article a ORDER BY a.id DESC');
        $lastTenArticles = $queryArticles->getResult();
    
        $queryComments = $manager->createQuery('SELECT c.author, c.content, c.createdAt FROM App\Entity\Comment c ORDER BY c.id DESC');
        $lastTenComments = $queryComments->getResult();

        $queryReportedComments = $manager->createQuery('SELECT c.id, c.author, c.content, c.createdAt FROM App\Entity\Comment c WHERE c.signalement = 1');
        $reportedComments = $queryReportedComments->getResult();

        $allCategories = $repo->findAll();

        return $this->render('back/index.html.twig', [
            'controller_name' => 'BackController',
            'lastTenArticles' => $lastTenArticles,
            'lastTenComments' => $lastTenComments,
            'reportedComments' => $reportedComments,
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
    public function form(Article $article = null, Request $request, EntityManagerInterface $manager, SluggerInterface $slugger) {
        
        if(!$article) {
            $article = new Article();
        }

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$article->getId() && !$article->getImage()) {
                $article->setCreatedAt(new \DateTime()); 
                $file = $form->get('image')->getData();
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('images_directory'), $fileName);
                $article->setImage($fileName);
            }


            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('show', ['id' => $article->getId()]);
        }

        return $this->render('back/create.html.twig', [
            'formArticle' => $form->createView(),
            'editMode' => $article->getId() !== null,
            'id'       => $article->getId()
        ]);
    }





    /**
     * @Route("/back/{id}/delete", name="back_delete")
     */
    public function deleteArticle($id, Article $article = null, Request $request, EntityManagerInterface $manager) {

        $delete = $manager->createQuery('DELETE App\Entity\Article a WHERE a.id=' . $id);
        $deleted = $delete->getResult();
        
        return $this->redirectToRoute('back_liste_articles');

    }




     /**
     * @Route("/back/category/{id}/delete", name="back_delete_category")
     */
    public function deleteCategory($id, Article $article = null, Request $request, EntityManagerInterface $manager) {

        $delete = $manager->createQuery('DELETE App\Entity\Article a WHERE a.category=' . $id);
        $deleted = $delete->getResult();

        $delete = $manager->createQuery('DELETE App\Entity\Category a WHERE a.id=' . $id);
        $deleted = $delete->getResult();
        
        return $this->redirectToRoute('back_category');

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

        // $totalArticlesByCategory = $manager->createQuery('SELECT COUNT(*) FROM App\Entity\Article a WHERE categoryId = '. $id);

        // $totalArticlesInPolitiques = $manager->createQuery('SELECT COUNT(*) FROM App\Entity\Article a WHERE categoryId = 4');

        $totalArticles = $articleRepo->createQueryBuilder("article")->select('count(article.category)')
                                         ->getQuery()
                                         ->getSingleScalarResult();
        
        
        
        return $this->render('back/category.html.twig', [
            'formCategory' => $form->createView(),
            'category'     => $category,
            'totalCategories' => $totalArticles,
            // 'totalArticlesInPolitiques' => $totalArticlesInPolitiques
            // 'totalArticlesByCategory' => $totalArticlesByCategory
        ]);

    }




    /**
     * @Route("back/category/{id}/edit", name="back_edit_category")
     */
    public function editCategory(int $id, Category $category, ArticleRepository $articleRepo,
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


        //Liste des articles de chaque catégories
        $queryArticlesPerCategory = $manager->createQuery('SELECT a.title, a.author, a.createdAt FROM App\Entity\Article a');
        $listArticlesPerCategory = $queryArticlesPerCategory->getResult();            

        return $this->render('back/editCategory.html.twig', [
            'formCategory' => $form->createView(),
            'listArticlesPerCategory' => $listArticlesPerCategory
        ]);

    }




    /**
     * @Route("/back/section", name="back_section")
     */
    public function section(Section $section = null, Request $request, EntityManagerInterface $manager,
    SectionRepository $repo, ArticleRepository $articleRepo) {
        $section = new Section();

        $form = $this->createFormBuilder($section)
                     ->add('title')
                     ->getForm();

        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($section);
            $manager->flush();

            return $this->redirectToRoute('back_section');
        }

        $section = $repo->findAll();

        // $totalArticles = $articleRepo->createQueryBuilder("article")->select('count(article.category)')
        //                                  ->getQuery()
        //                                  ->getSingleScalarResult();
        
        
        
        return $this->render('back/section.html.twig', [
            'formSection' => $form->createView(),
            'section'     => $section
            // 'totalCategories' => $totalArticles
        ]);

    }


    /**
     * @Route("/back/{id}/delete", name="back_delete_section")
     */
    public function deleteSection($id, Request $request, EntityManagerInterface $manager) {

        $delete = $manager->createQuery('DELETE App\Entity\Section a WHERE a.id=' . $id);
        $deleted = $delete->getResult();
        
        return $this->redirectToRoute('back_section');

    }


     /**
     * @Route("/back/comments", name="back_comment")
     */
    public function manageComments(CommentRepository $repo, EntityManagerInterface $manager, Request $request) {
        $reportedComments = $repo->findBy(array('signalement' => 1));

        return $this->render('back/comments.html.twig', ['comments' => $reportedComments]);
    }


    /**
     * @Route("back/comment/{id}/delete", name="back_delete_comments")
     */
    public function deleteComments($id, Comment $comment = null, Request $request, EntityManagerInterface $manager) {
        $delete = $manager->createQuery('DELETE App\Entity\Comment c WHERE c.id=' .$id);
        $deletedComment = $delete->getResult();

        return $this->redirectToRoute('back_comment');
    }
}

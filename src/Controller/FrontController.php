<?php

namespace App\Controller;

use App\Entity\APINews;
use App\Entity\Article;
use App\Entity\Comment;

use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
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
        //MAIN
        $articles = $articleRepo->findBy([], ['id' => 'DESC']);

        //SECTION  À LIRE
        $queryArticles = $manager->createQuery('SELECT a.id, a.title, a.author, a.entete, a.createdAt FROM App\Entity\Article a WHERE a.section = 2 ORDER BY a.id DESC');
        $aLire = $queryArticles->getResult();

        //SECTION POLITIQUE
        // $sectionPolitique = $articleRepo->findBy(['section' => 'opinion']);
        $queryArticlesPolitique = $manager->createQuery('SELECT a.id, a. title, a.author, a.entete, a.createdAt FROM App\Entity\Article a WHERE a.category = 1 ORDER BY a.id DESC')->setMaxResults(4);
        $articlesPolitique = $queryArticlesPolitique->getResult();

        //CATEGORIE JURIDIQUE
        $queryArticlesJuridique = $manager->createQuery('SELECT a.id, a. title, a.author, a.entete, a.createdAt FROM App\Entity\Article a WHERE a.category = 2 and a.category = 3 ORDER BY a.id DESC')->setMaxResults(4);
        $articlesJuridique = $queryArticlesJuridique->getResult();

        //CATEGORIE ECONOMIE
        $queryArticlesDroitsFamille = $manager->createQuery('SELECT a.id, a. title, a.author, a.entete, a.createdAt FROM App\Entity\Article a WHERE a.category = 3 ORDER BY a.id DESC')->setMaxResults(4);
        $articlesDroitsFamille = $queryArticlesDroitsFamille->getResult();

        //CATEGORIE SOCIETE
        $queryArticlesSociété = $manager->createQuery('SELECT a.id, a. title, a.author, a.entete, a.createdAt FROM App\Entity\Article a WHERE a.category = 4 ORDER BY a.id DESC')->setMaxResults(4);
        $articlesSociété = $queryArticlesSociété->getResult();

        //CATEGORIE OPINION
        $queryArticlesOpinion = $manager->createQuery('SELECT a.id, a. title, a.author, a.entete, a.createdAt FROM App\Entity\Article a WHERE a.category = 5 ORDER BY a.id DESC')->setMaxResults(4);
        $articlesOpinion = $queryArticlesOpinion->getResult();

        //SIDE CATEGORIES  
        $allCategories = $repo->findAll();


        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'articles' => $articles,
            'aLire' => $aLire,
            'allCategories' => $allCategories,
            'articlesPolitique' => $articlesPolitique,
            'articlesJuridique' => $articlesJuridique,
            'articlesSociété' => $articlesSociété,
            'articlesOpinion' => $articlesOpinion
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
     * @Route("/comment/{idArticle}/{idComment}/report", name="report")
     */
    public function reportComment($idArticle, $idComment, Request $request, EntityManagerInterface $manager) {
        $reportComment = $manager->createQuery('UPDATE App\Entity\Comment a SET a.signalement = 1 WHERE a.id =' .$idComment);
        $commentReported = $reportComment->getResult();

        return $this->redirectToRoute('show', [
            'id' => $idArticle,
        ]);
    }




   
    //     $news = $actus->getJson();
    //     $limit - (new \DateTime("now"))->modify('+25 minutes');
    //     if($news["update"] > $limit) {
    //         $newData = file_get_contents('https://newsapi.org/v2/top-headlines?country=fr&apiKey=3b19d13356dd4e0cacaaf5785135891c');
    //         $actus->update($newData);
    //         return $this->json($newData);
    //     }

    //     return $this->json($news["json"]);
    // }
}

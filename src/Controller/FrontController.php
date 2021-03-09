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

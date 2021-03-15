<?php

namespace App\Controller;

use App\Entity\APINews;
use App\Repository\APINewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;


class ActualitesController extends AbstractController {

    function arrayToObject($array) {
        return (object)$array;
    }

    function objectToArray($object) {
        return (array)$object;
    }



    function updateNews(){
        $data = file_get_contents("https://newsapi.org/v2/top-headlines?country=fr&apiKey=3b19d13356dd4e0cacaaf5785135891c");
        
        //CONVERSION D'UN STRING EN ARRAY
        $obj = json_decode($data, true);
        $listOfArticles = $obj['articles'];
        

        //CONVERSION D'UN ARRAY EN OBJET
        // $listOfArticles = $this->arrayToObject($obj);
        // $this->denormalizer->denormalize($listOfArticles, APINews::class);

        //on enregitre dans la base
        $api = new APINews();
        // dd(gettype($api));
        $api->setJson($listOfArticles);
        $api->setDate(new \DateTime());
        // dd($api);
        
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($api);
        $manager->flush();
        return $listOfArticles;
        
    }



    /**
     * @Route("/api/actus", name="api")
     */
    function getNews(APINewsRepository $repo, EntityManagerInterface $manager){
        // $actu = $this->updateNews();
        // dd($actu);


        //on récupère l'actu dans un objet $actu
        $queryActu = $manager->createQuery('SELECT a.id, a.date, a.json FROM App\Entity\APINews a ORDER BY a.id DESC')
        ->setMaxResults(1);
        $actus = $queryActu->getResult();
        $actus = $actus[0];
        // dd($actus);
        // dd(gettype($actus['date']));

        //CONVERSION D'UN OBJET EN ARRAY
        // $queryToArray = $this->objectToArray($queryActu);
        // $arrayRestoredFromDb = unserialize(base64_decode($queryActu));

       $now = new \DateTime();
       $ecart = $now->diff($actus['date']);
   
        if($ecart->i > 25) {
            $actus = $this->updateNews();
        }


        return $this->render('front/actualites.html.twig', [
            'actus' => $actus,
        ]);
    }

    
}

<?php

namespace App\Controller;

use App\Entity\APINews;
use App\Repository\APINewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;


class ActualitesController extends AbstractController {

    function arrayToObject($array) {
        return (object)$array;
    }



    /**
     * @Route("/api/actus", name="api")
     * @return  [type]  [return description]
     */
    function getNews(APINewsRepository $repo){
        // $api = $this->updateNews();
        // dd($api);

        //on récupère l'actu dans un objet $actualite
        $manager = $this->getDoctrine()->getManager();

        $queryActu = $manager->createQuery('SELECT a.id, a.date, a.json FROM App\Entity\APINews a');
        $actu = $queryActu->getResult();

        // dd($actu->date);

        //Pour récupérer le dernier élément 
        // $lastActu = $repo->findOneBy(
        //     array('json'=>$actu),
        //     array('id' => 'DESC')
        // );

        $firtsDownloadDateTime = new APINews();
        $firtsDownloadDateTime->getDate();

        //si la $actualite->date > 25 minutes $actualite->data = updateNews();
        if($firtsDownloadDateTime->date > '25 minutes') {
            $firtsDownloadDateTime->data = $this->updateNews();
        }
        //   $limit - (new \DateTime("now"))->modify('+25 minutes');
        //   if($news["update"] > $limit) {
        //       $newData = file_get_contents('https://newsapi.org/v2/top-headlines?country=fr&apiKey=3b19d13356dd4e0cacaaf5785135891c');
        //       $actus->update($newData);
        //       return $this->json($newData);
        //   }

        // }
        // //envoyer la réponse sous forme de json $actualite

        // return $this->json($api["json"]);


        return $this->render('front/actualites.html.twig', [
            'actu' => $actu
        ]);
    }
    
    
    
    function updateNews(){
        $data = file_get_contents("https://newsapi.org/v2/top-headlines?country=fr&apiKey=3b19d13356dd4e0cacaaf5785135891c");
        
        //CONVERSION D'UN STRING EN ARRAY
        // $obj = json_decode($data, true);
        // $listOfArticles = $obj['articles'];

        //CONVERSION D'UN ARRAY EN OBJET
        // $listOfArticles = $this->arrayToObject($obj);
        // $this->denormalizer->denormalize($listOfArticles, APINews::class);

        //on enregitre dans la base
        $api = new APINews();
        // dd(gettype($data));
        $api->setJson($data);

        $api->setDate(new \DateTime());
     
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($api);
        $manager->flush();
        return $data;
    }
}

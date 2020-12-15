<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++){
            $articles = new Article();
            $articles->setTitle("Titre de l'article n°$i")
                    ->setAuteur("Gabrielle")
                    ->setEntete("<p>mehler gtmbm blpobblrgr</p>")
                    ->setCategorie("Politique")
                    ->setContenu("")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());

            $manager->persist($articles);

        }

        $manager->flush();
    }
}

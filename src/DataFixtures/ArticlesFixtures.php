<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Articles;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++){
            $article = new Articles();
            $article->setTitle("Titre de l'article n°$i")
                    ->setContent("<p>Contenu de l'article</p>")
                    ->setImage("http://placehold.it/350w150")
                    ->setCreatedAt(new \DateTime())
                    ->setAuthor("Auteur de l'article")
                    ->setCategory("Catégorie de l'article")
                    ->setResume("Extrait de l'article");
            
            $manager->persist($article);
        }

        $manager->flush();
    }
}

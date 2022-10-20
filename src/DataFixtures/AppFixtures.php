<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Categorie;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    

    public function load(ObjectManager $manager)
    {
       $faker =  Factory::create('fr_FR');

    $categories = [];
    $formations = [];
    for ($i = 1; $i <= 5; $i++) {
        $category = new Categorie();
        $category->setTitre($faker->titre);          
        $manager->persist($category);
             
        $categories[] = $category;
    }
        for($i = 0; $i < 10; $i++){
             $formation = new Formation();
             $formation->setTitre($this->faker->word(5,true))
                       ->setDescription($this->faker->text());                
                     
            // foreach ($categories as $category) {
            //     $formation->getCategorie($categories)->new($category);
            // }
             $manager->persist($formation);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

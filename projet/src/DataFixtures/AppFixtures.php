<?php

namespace App\DataFixtures;

use App\Entity\Conseiller;
use App\Entity\Langue;
use App\Entity\RDV;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //utilisation de Faker
        $faker = Factory::create('fr FR');

        $langue1 = new Langue();
        $langue2 = new Langue();

        $langue1->setLanguage('fr');
        $langue1->setFile('/img/lang/france.png');
        $langue2->setLanguage('en');
        $langue2->setFile('/img/lang/english.png');

        $manager->persist($langue1);
        $manager->persist($langue2);

        for($i=0; $i<3; $i++)
        {
            $conseiller = new Conseiller();

            $conseiller->setNom($faker->firstName())
                        ->setPrenom($faker->lastName())
                        ->setDateDeNaissance($faker->dateTimeBetween('-6 month', 'now'))
                        ->setEmail($faker->email())
                        ->setTel("0760777811")
                        ->addLanguge($langue1)->addLanguge($langue2);

            $manager->persist($conseiller);
        }

        // $product = new Product();
        // $manager->persist($product);



        $manager->flush();
    }
}

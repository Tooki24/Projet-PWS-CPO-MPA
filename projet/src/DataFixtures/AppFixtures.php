<?php

namespace App\DataFixtures;

use App\Entity\Langue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $langue1 = new Langue();
        $langue2 = new Langue();

        $langue1->setLanguage('fr');
        $langue1->setFile('/img/lang/france.png');
        $langue2->setLanguage('en');
        $langue2->setFile('/img/lang/english.png');

        $manager->persist($langue1);
        $manager->persist($langue2);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

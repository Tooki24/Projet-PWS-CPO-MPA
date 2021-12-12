<?php

namespace App\DataFixtures;

use App\Entity\Conseiller;
use App\Entity\Creneau;
use App\Entity\Langue;
use App\Entity\RDV;
use Cassandra\Date;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Validator\Constraints\Time;

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

        //Incrementation Creneau pour une journée

        $oldDate = "2021-12-7 09:00:00";

        $iDay = 7;
        $day = "7";
        for($i=0; $i<5; $i++)
        {
            $idSemaine = 49;
            $iMin = 0;
            $iHours = 9;
            $min = "0";
            $hours = "09";

            for($y=0; $y<31; $y++)
            {
                $creneau = new Creneau();

                $creneau->setHeureDebut(new \DateTime($oldDate))
                    ->setStatus(true)
                    ->setSemaine("Semaine ".strval($idSemaine))
                    ->setDay(new \DateTime($oldDate));
                $iMin+=15;
                $min = strval($iMin);
                if($iMin >= 60)
                {
                    $iHours++;
                    $iMin = 0;
                    $min = strval($iMin);
                    $hours = strval($iHours);
                }
                $oldDate = "2021-02-".$day." ".$hours.":".$min.":00";
                if($iHours == 12)
                {
                    $iHours +=2;
                    $hours = strval($iHours);
                    $oldDate = "2021-02-".$day." ".$hours.":".$min.":00";
                }

                $manager->persist($creneau);
            }
            $iDay+=1;
            $day = strval($iDay);
            $oldDate = "2021-02-".$day." ".$hours.":".$min.":00";

        }


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}


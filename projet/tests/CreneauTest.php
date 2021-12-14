<?php

namespace App\Tests;

use App\Entity\Creneau;
use PHPUnit\Framework\TestCase;

class CreneauTest extends TestCase
{
    public function testIsTrue(): void
    {
        $date = new \DateTime();

        $creneau = new Creneau();

        $creneau->setDay($date)
                ->setStatus(true)
                ->setSemaine("Semaine 50")
                ->setHeureDebut($date);

        $this->assertTrue($creneau->getDay() === $date);
        $this->assertTrue($creneau->getStatus() === true);
        $this->assertTrue($creneau->getSemaine() === "Semaine 50");
        $this->assertTrue($creneau->getHeureDebut() === $date);
    }

    public function testIsFalse(): void
    {
        $date = new \DateTime();

        $creneau = new Creneau();

        $creneau->setDay($date)
            ->setStatus(true)
            ->setSemaine("Semaine 50")
            ->setHeureDebut($date);

        $this->assertFalse($creneau->getDay() === new \DateTime());
        $this->assertFalse($creneau->getStatus() === false);
        $this->assertFalse($creneau->getSemaine() === "Semaine 51");
        $this->assertFalse($creneau->getHeureDebut() === new \DateTime());
    }

    public function testIsEmpty(): void
    {
        $date = new \DateTime();

        $creneau = new Creneau();

        $this->assertEmpty($creneau->getDay());
        $this->assertEmpty($creneau->getStatus());
        $this->assertEmpty($creneau->getSemaine());
        $this->assertEmpty($creneau->getHeureDebut());
    }
}

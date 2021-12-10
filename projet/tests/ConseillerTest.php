<?php

namespace App\Tests;

use App\Entity\Conseiller;
use PHPUnit\Framework\TestCase;

class ConseillerTest extends TestCase
{
    public function testIsTrue(): void
    {
        $date = new \DateTime();
        $conseiller=new Conseiller();

        $conseiller ->setNom('nom1')
            ->setPrenom('prenom1')
            ->setDateDeNaissance($date)
            ->setEmail('email@test.com')
            ->setTel('0101010101')
            ->setSpecialite('specialite1');

        $this->assertTrue($conseiller->getNom()==='nom1');
        $this->assertTrue($conseiller->getPrenom()==='prenom1');
        $this->assertTrue($conseiller->getDateDeNaissance()===$date);
        $this->assertTrue($conseiller->getEmail()==='email@test.com');
        $this->assertTrue($conseiller->getTel()==='0101010101');
        $this->assertTrue($conseiller->getSpecialite()==='specialite1');
    }
    public function testIsFalse(): void
    {
        $date = new \DateTime();
        $conseiller=new Conseiller();

        $conseiller ->setNom('nom1')
            ->setPrenom('prenom1')
            ->setDateDeNaissance($date)
            ->setEmail('email@test.com')
            ->setTel('0101010101')
            ->setSpecialite('specialite1');

        $this->assertFalse($conseiller->getNom()==='false');
        $this->assertFalse($conseiller->getPrenom()==='false');
        $this->assertFalse($conseiller->getDateDeNaissance()===new \DateTime());
        $this->assertFalse($conseiller->getEmail()==='false');
        $this->assertFalse($conseiller->getTel()==='false');
        $this->assertFalse($conseiller->getSpecialite()==='false');
    }
    public function testIsEmpty(): void
    {
        $conseiller=new Conseiller();

        $this->assertEmpty($conseiller->getNom());
        $this->assertEmpty($conseiller->getPrenom());
        $this->assertEmpty($conseiller->getDateDeNaissance());
        $this->assertEmpty($conseiller->getEmail());
        $this->assertEmpty($conseiller->getTel());
        $this->assertEmpty($conseiller->getSpecialite());
    }

}
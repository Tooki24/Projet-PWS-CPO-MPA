<?php

namespace App\Tests;

use App\Entity\Langue;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $date = new \DateTime();
        $user = new User();

        $user->setNom('Fumel')
            ->setPrenom('Mathis')
            ->setEmail('test@touriste.com')
            ->setTel('00000000')
            ->setNumTouriste(2)
            ->setNewletter(true)
            ->setDateArrive($date)
            ->setDateDepart($date);

        $this->assertTrue($user->getNom() === 'Fumel');
        $this->assertTrue($user->getPrenom() === 'Mathis');
        $this->assertTrue($user->getEmail() === 'test@touriste.com');
        $this->assertTrue($user->getTel() === '00000000');
        $this->assertTrue($user->getNumTouriste() == 2);
        $this->assertTrue($user->getNewletter() === true);
        $this->assertTrue($user->getDateArrive() === $date);
        $this->assertTrue($user->getDateDepart() === $date);
    }
    public function testIsFalse(): void
    {
        $date = new \DateTime();
        $user = new User();

        $user->setNom('Fumel')
            ->setPrenom('Mathis')
            ->setEmail('test@touriste.com')
            ->setTel('00000000')
            ->setNumTouriste(2)
            ->setNewletter(true)
            ->setDateArrive($date)
            ->setDateDepart($date)
            ->setLangue($langue);

        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getEmail() === 'false');
        $this->assertFalse($user->getTel() === 'false');
        $this->assertFalse($user->getNumTouriste() == 1);
        $this->assertFalse($user->getNewletter() === false);
        $this->assertFalse($user->getDateArrive() === new \DateTime());
        $this->assertFalse($user->getDateDepart() === new \DateTime());
        $this->assertFalse($user->getLangue() === new Langue());
    }

    public function testIsEmpty(): void
    {
        $user = new User();


        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getTel());
        $this->assertEmpty($user->getNumTouriste());
        $this->assertEmpty($user->getNewletter());
        $this->assertEmpty($user->getDateArrive());
        $this->assertEmpty($user->getDateDepart());
    }

}

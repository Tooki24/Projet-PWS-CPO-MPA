+<?php

namespace App\Tests;

use App\Entity\Langue;
use PHPUnit\Framework\TestCase;

class LangueTest extends TestCase
{
    public function testIsTrue(): void
    {
        $langue=new Langue();
        $langue ->setLanguage('Francais')
            ->setFile('testFile');
        $this->assertTrue($langue->getLanguage()==='Francais');
        $this->assertTrue($langue->getFile()==='testFile');
    }
    public function testIsFalse(): void
    {
        $langue=new Langue();
        $langue ->setLanguage('Francais')
            ->setFile('testFile');
        $this->assertFalse($langue->getLanguage()==='false');
        $this->assertFalse($langue->getFile()==='false');
    }
    public function testIsEmpty(): void
    {
        $langue=new Langue();
        $this->assertEmpty($langue->getLanguage());
        $this->assertEmpty($langue->getFile());
    }
}
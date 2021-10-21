<?php

namespace App\Tests\Domain;

use PHPUnit\Framework\TestCase;
use App\Domain\Cinema;

class CinemaTest extends TestCase
{
    public function test_un_cinema_expose_son_nom(){
        $cinema=new Cinema("Le Lafayette");
        $this->assertEquals("Le Lafayette",$cinema->getNom());
    }
}

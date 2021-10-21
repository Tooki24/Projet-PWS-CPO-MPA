<?php
namespace App;
use PHPUnit\Framework\TestCase;

class chfRomTest extends TestCase
{
    public function test_chiffre_romain_entre_1_et_3()
    {

        $partie=new chfRom();
        $resultat = $partie->convertiseur(2);
        $this->assertEquals("II", $resultat);
        // $resultat doit afficher "fizz"
    }
    public function test_chiffre_romain_entre_4()
    {

        $partie = new chfRom();
        $resultat = $partie->convertiseur(4);
        $this->assertEquals("IV", $resultat);
    }
    public function test_chiffre_romain_entre_5_et_8()
    {

        $partie=new chfRom();
        $resultat = $partie->convertiseur(6);
        $this->assertEquals("VI", $resultat);
        // $resultat doit afficher "fizz"
    }
}
?>
<?php
    namespace App;
    use PHPUnit\Framework\TestCase;

    class FizzbuzzTest extends TestCase
    {
        public function test_retourne_fizz_quand_entier_multiple_de_trois()
        {
            $partie=new Fizzbuzz();
            $resultat = $partie->joue(3);
            $this->assertEquals("", $resultat);
            // $resultat doit afficher "fizz"
        }
    }
?>
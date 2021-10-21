<?php

namespace App\Tests\Domain\Command;

use App\Domain\Cinema;
use App\Domain\Command\EnleverFilmAAfficheCommand;
use App\Domain\Command\EnleverFilmAAfficheHandler;

use App\Domain\Film;
use App\Domain\ProgrammeDeCinema;
use phpDocumentor\Reflection\Types\This;
use PHPUnit\Framework\TestCase;

class EnleverFilmAAfficheHandlerTest extends TestCase
{
    public function test_enlever_un_film_a_affiche_sollicite_le_programme()
    {
        //Arange
        $film = $this->createMock(Film::class);
        $cinema = $this->createMock(Cinema::class);
        $programme = $this->createMock(ProgrammeDeCinema::class);
        $command = new EnleverFilmAAfficheCommand($film, $cinema);
        $handler = new EnleverFilmAAfficheHandler($programme);

        //Assert
        $programme->expects($this->once())->method("enleverFilmAAffiche")->with($film, $cinema);

        //Act
        $handler->handle($command);

    }

}
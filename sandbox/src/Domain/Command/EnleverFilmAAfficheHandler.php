<?php

namespace App\Domain\Command;

use App\Domain\ProgrammeDeCinema;

class EnleverFilmAAfficheHandler
{
    private ProgrammeDeCinema $itsProgramme;
    public function __construct(ProgrammeDeCinema $programme)
    {
        $this->itsProgramme = $programme;
    }
    public function handle(EnleverFilmAAfficheCommand $command)
    {
        $this->itsProgramme->enleverFilmAAffiche($command->getItsFilm(), $command->getItsCinema());
    }
}
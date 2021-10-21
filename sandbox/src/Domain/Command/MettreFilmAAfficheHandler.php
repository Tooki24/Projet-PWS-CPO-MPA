<?php

namespace App\Domain\Command;

use App\Domain\Cinema;
use App\Domain\Film;
use App\Domain\ProgrammeDeCinema;

class MettreFilmAAfficheHandler
{
    private ProgrammeDeCinema $itsProgramme;
    public function __construct(ProgrammeDeCinema $programme)
    {
        $this->itsProgramme = $programme;
    }
    public function handle(MettreFilmAAfficheCommand $command)
    {
        return $this->itsProgramme->mettreFilmAAffiche($command->getItsFilm(), $command->getItsCinema());
    }
}
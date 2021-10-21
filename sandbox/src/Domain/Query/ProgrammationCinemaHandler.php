<?php

namespace App\Domain\Query;
use App\Domain\ProgrammeDeCinema;

class ProgrammationCinemaHandler
{
    private $itsProgramme;

    public function __construct(ProgrammeDeCinema $programme)
    {
        $this->itsProgramme = $programme;
    }
    public function handle(ProgramationCinemaQuery $requete):iterable
    {
        return $this->itsProgramme->getFilmsPourCinema();
    }
}


<?php

namespace App\Domain\Command;

use App\Domain\Cinema;
use App\Domain\Film;

class EnleverFilmAAfficheCommand
{
    private Film $itsFilm;
    private Cinema $itsCinema;
    public function __construct(Film $film, Cinema $cinema)
    {
        $this->itsFilm = $film;
        $this->itsCinema = $cinema;
    }

    /**
     * @return Film
     */
    public function getItsFilm(): Film
    {
        return $this->itsFilm;
    }

    /**
     * @return Cinema
     */
    public function getItsCinema(): Cinema
    {
        return $this->itsCinema;
    }
}
<?php

namespace App\Domain;


interface ProgrammeDeCinema
{
    public function getFilmsPourCinema():iterable;
    public function mettreFilmAAffiche(Film $film, Cinema $cinema);
    public function enleverFilmAAffiche(Film $film, Cinema$cinema);

}
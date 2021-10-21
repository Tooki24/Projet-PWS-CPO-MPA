<?php

namespace App\Domain;

class Cinema
{
    private $itsName;
    public function __construct($name)
    {
        $this->itsName = $name;
    }
    public function getNom(){
        return $this->itsName;
    }
}
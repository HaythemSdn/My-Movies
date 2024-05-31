<?php

namespace mdb;

use mdb\MoviesDB;

class Film {
    private $mdb;

    public function __construct() {
        $this->mdb = new MoviesDB();
    }

    
}


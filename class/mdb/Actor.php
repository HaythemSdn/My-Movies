<?php

namespace mdb;

use mdb\MoviesDB;

class Actor {
    private $mdb;

    public function __construct() {
        $this->mdb = new MoviesDB();
    }

    public function getAllActors() {
        $query = "SELECT nom, photo FROM acteurs ORDER BY nom ASC";
        $result = $this->mdb->exec($query, []);
        
      

        return $result ? $result : []; 
    }
}

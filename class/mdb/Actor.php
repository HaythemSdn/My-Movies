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
        
        // Debugging
        echo '<div class="text-white">';

        echo "SQL Query: " . $query . "<br>";
        echo "Returned Data: ";

        print_r($result);

        echo '<div class="text-black">';

        return $result ? $result : []; 
    }
}

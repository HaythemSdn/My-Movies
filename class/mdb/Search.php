<?php

namespace mdb;

use mdb\MoviesDB;

class Search {
    private $mdb;

    public function __construct() {
        $this->mdb = new MoviesDB();
    }


    public function getAllFilms(){
        $result = $this->mdb->exec(
            "SELECT * FROM films ORDER BY date_sortie DESC",
            null,
            'renderers\NewFilmRenderer'
        );
        return $result ? $result : []; 
    }
    public function getAllActors(){
        $result = $this->mdb->exec(
            "SELECT * FROM acteurs ORDER BY nom DESC",
            null,
            'renderers\searchRenderers\ActorRenderer'
        );
        return $result ? $result : [];
    }
    public function getAllDirectors(){
        $result = $this->mdb->exec(
            "SELECT * FROM realisateurs ORDER BY nom DESC",
            null,
            'renderers\searchRenderers\DirectorRenderer'
        );
        return $result ? $result : [];
    }
    public function getAllTags(){
        $result = $this->mdb->exec(
            "SELECT * FROM tags ORDER BY nom DESC",
            null,
            'renderers\searchRenderers\TagRenderer'
        );
        return $result ? $result : [];
    }

}

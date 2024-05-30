<?php

namespace mdb;

use mdb\MoviesDB;

class Film {
    private $mdb;

    public function __construct() {
        $this->mdb = new MoviesDB();
    }
    public function getTrending() {
        $result = $this->mdb->exec(
            "SELECT films.*, GROUP_CONCAT(tags.nom) AS tags
             FROM films
             LEFT JOIN film_tag ON films.id = film_tag.film_id
             LEFT JOIN tags ON film_tag.tag_id = tags.id
             GROUP BY films.id
             ORDER BY films.rating DESC",
            null,
            'rendrers\TrendingRenderer'
        );
        return $result ? $result : []; 
    }
    

    public function getRecent() {
        $result = $this->mdb->exec(
            "SELECT * FROM films ORDER BY date_sortie DESC",
            null,
            'rendrers\RecentRenderer'
        );
        return $result ? $result : []; 
    }

    public function getNewFilms() {
        $result = $this->mdb->exec(
            "SELECT * FROM films WHERE type = 'film' ORDER BY date_sortie DESC LIMIT 3",
            null,
            'rendrers\NewFilmRenderer'
        );
        return $result ? $result : []; 
    }
    public function getSeries() {
        $result = $this->mdb->exec(
            "SELECT * FROM films WHERE type = 'serie' ORDER BY date_sortie DESC LIMIT 3",
            null,
            'rendrers\SeriesRenderer'
        );
        return $result ? $result : []; 
    }
}


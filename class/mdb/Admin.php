<?php

namespace mdb;

use mdb\MoviesDB;

class Admin {
    private $mdb;
    public const UPLOAD_DIR = "uploads/" ;
    public function __construct() {
        $this->mdb = new MoviesDB();
    }

    public function getAllUsers(){
        $result = $this->mdb->exec(
            "SELECT * FROM users",
            null,
            'rendrers\UserRenderer'
        );
        return $result ? $result : []; 
    }
    // Create a new film in the database
    public function createFilm($titre, $date_sortie, $realisateur_id, $type, $description = null, $imgFile = null, $season = null)
    {
        $titre = htmlspecialchars($titre);
        $description = htmlspecialchars($description);
        $imgName = null;

        if ($imgFile != null) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::UPLOAD_DIR;
            if (!is_dir($dirname)) mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded) die("FILE NOT UPLOADED");
        } else {
            echo "NO IMAGE !!!!";
        }

        $query = 'INSERT INTO Films (titre, date_sortie, affiche, synopsis, realisateur_id, rating, type, season) 
                  VALUES (:titre, :date_sortie, :affiche, :synopsis, :realisateur_id, :rating, :type, :season)';
        $params = [
            'titre' => $titre,
            'date_sortie' => $date_sortie,
            'affiche' => $imgName,
            'synopsis' => $description,
            'realisateur_id' => $realisateur_id,
            'rating' => 0,
            'type' => $type,
            'season' => $type == 'serie' ? $season : null
        ];
        return $this->mdb->exec($query, $params);
    }

    public function addActorToFilm($film_id, $actor_id)
    {
        $query = 'INSERT INTO film_acteur (film_id, acteur_id) VALUES (:film_id, :acteur_id)';
        $params = [
            'film_id' => $film_id,
            'acteur_id' => $actor_id
        ];
        return $this->mdb->exec($query, $params);
    }

    public function addTagToFilm($film_id, $tag_id)
    {
        $query = 'INSERT INTO film_tag (film_id, tag_id) VALUES (:film_id, :tag_id)';
        $params = [
            'film_id' => $film_id,
            'tag_id' => $tag_id
        ];
        return $this->mdb->exec($query, $params);
    }

    public function getAllDirectors()
    {
        $result = $this->mdb->exec(
            "SELECT id, nom FROM realisateurs",
            null,
        );
        return $result ? $result : []; 
    }
    public function getAllActors()
    {
        $result = $this->mdb->exec(
            "SELECT id, nom FROM acteurs",
            null,
        );
        return $result ? $result : []; 
    }
    public function getAllTags()
    {
        $result = $this->mdb->exec(
            "SELECT id, nom FROM tags",
            null,
        );
        return $result ? $result : []; 
    }
}


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

    public static function getImage($image){
        return str_contains($image, "http") ? $image : $GLOBALS['DOCUMENT_DIR'] . "../uploads/" . $image;    
    }

    public function getActorDetails($actorName = null) {
        if ($actorName) {
            $query = "
                SELECT
                    a.nom as actor_name,
                    a.photo as actor_photo,
                    GROUP_CONCAT(DISTINCT f.titre ORDER BY f.titre) as films
                FROM acteurs a
                LEFT JOIN film_acteur fa ON a.id = fa.acteur_id
                LEFT JOIN films f ON fa.film_id = f.id
                WHERE a.nom = ?
                GROUP BY a.nom, a.photo
            ";
            $params = [$actorName];
            $result = $this->mdb->exec($query, $params, 'renderers\ActorPageRenderer');
            return $result ? $result[0] : null;
        } else {
            $query = "SELECT nom, photo FROM acteurs ORDER BY nom ASC";
            $result = $this->mdb->exec($query, []);
            return $result ? $result : [];
        }
    }

    public function getActorInfo($actor_name) {
        $result = $this->mdb->exec(
            "SELECT * FROM acteurs WHERE nom = ?",
            [$actor_name],
            null
        );

        if (!$result) {
            error_log("No actor found with name: $actor_name");
        } else {
            error_log("Actor found: " . print_r($result, true));
        }

        return $result ? $result[0] : null;
    }
        
}

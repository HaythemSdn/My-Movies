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
            'renderers\TrendingRenderer'
        );
        return $result ? $result : []; 
    }
    

    public function getRecent() {
        $result = $this->mdb->exec(
            "SELECT * FROM films ORDER BY date_sortie DESC",
            null,
            'renderers\RecentRenderer'
        );
        return $result ? $result : []; 
    }

    public function getNewFilms() {
        $result = $this->mdb->exec(
            "SELECT * FROM films WHERE type = 'film' ORDER BY date_sortie DESC LIMIT 3",
            null,
            'renderers\NewFilmRenderer'
        );
        return $result ? $result : []; 
    }
    public function getNewSeries() {
        $result = $this->mdb->exec(
            "SELECT * FROM films WHERE type = 'serie' ORDER BY date_sortie DESC LIMIT 3",
            null,
            'renderers\NewFilmRenderer'
        );
        return $result ? $result : []; 
    }
public function getFilm($name) {
    $query = "
    SELECT 
        f.titre, f.date_sortie, f.affiche, f.synopsis, 
        r.nom as realisateur_nom, r.photo as realisateur_photo,
        GROUP_CONCAT(DISTINCT t.nom) as tags,
        GROUP_CONCAT(DISTINCT a.nom ORDER BY a.nom) as acteurs_noms,
        GROUP_CONCAT(DISTINCT a.photo ORDER BY a.nom) as acteurs_photos,
        f.rating, f.type
    FROM films f
    LEFT JOIN realisateurs r ON f.realisateur_id = r.id
    LEFT JOIN film_tag ft ON f.id = ft.film_id
    LEFT JOIN tags t ON ft.tag_id = t.id
    LEFT JOIN film_acteur fa ON f.id = fa.film_id
    LEFT JOIN acteurs a ON fa.acteur_id = a.id
    WHERE f.titre = ?
    GROUP BY f.id, r.nom, r.photo
";
    $params = [$name];
    $result = $this->mdb->exec($query, $params, 'renderers\FilmPageRenderer');
    return $result ? $result[0] : null; 
}
public static function getImage($image){
    return str_contains($image, "http") ? $image : $GLOBALS['DOCUMENT_DIR'] . "../uploads/" . $image;    
}
    
public function getActorDetails($actorName) {
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
}
// this one
public function getFilmsByActor($actor_name) {
    $query = "
        SELECT f.* 
        FROM films f
        JOIN film_acteur fa ON f.id = fa.film_id
        JOIN acteurs a ON fa.acteur_id = a.id
        WHERE a.nom = ?
    ";
    $params = [$actor_name];
    return $this->mdb->exec($query, $params, 'mdb\Film'); 
}

/*  cella la ne marche pas
public function getFilmsByActor($actor_name) {
    $result = $this->mdb->exec(
        "SELECT f.* 
         FROM films f
         INNER JOIN film_acteur fa ON f.id = fa.film_id
         INNER JOIN acteurs a ON fa.acteur_id = a.id
         WHERE a.nom = ?",
        [$actor_name],
        '..\renderers\FilmRenderer'
    );
    return $result ? $result : [];
}
 */

}


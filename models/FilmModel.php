<?php
namespace models;

use models\base\SQL;
use models\classes\Actor;
use models\classes\Film;
use models\classes\Gallery;

class FilmModel extends SQL
{
    public function __construct()
    {
        parent::__construct('films', 'id');
    }

    /**
     * Liste tous les films
     * @return Film[]
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM films";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Film::class);
    }

    public function getFilmById($id)
    {
        //$query = "SELECT films.*,actors.name,actors.picture,actors.played_character FROM `films` JOIN films_actors ON films_actors.id_film = films.id JOIN actors ON films_actors.id_actor = actors.id WHERE films.id = :id";
        $query = "SELECT * FROM films WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        return $stmt->fetchObject(Film::class);
    }

    public function getActorsByFilmId($id)
    {
        $query = "SELECT actors.name,actors.picture,actors.played_character FROM `films` JOIN films_actors ON films_actors.id_film = films.id JOIN actors ON films_actors.id_actor = actors.id WHERE films.id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
    }

    public function getGalleryByFilmId($id)
    {
        $query = "SELECT gallery.* FROM `films` JOIN films_gallery ON films_gallery.id_film = films.id JOIN gallery ON gallery.id = films_gallery.id_gallery WHERE films.id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Gallery::class);
    }
}

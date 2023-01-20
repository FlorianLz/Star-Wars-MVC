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
        $query = "SELECT actors.id,actors.name,actors.picture,films_actors.played_character as played_character FROM `films` JOIN films_actors ON films_actors.id_film = films.id JOIN actors ON films_actors.id_actor = actors.id WHERE films.id = :id";
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

    public function addFilm(Film $film)
    {
        $query = "INSERT INTO films (name, resume, synopsis, release_date, trailer, cover) VALUES (:name, :resume, :synopsis, :release_date, :trailer, :cover)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "name" => $film->getName(),
            "resume" => $film->getResume(),
            "synopsis" => $film->getSynopsis(),
            "release_date" => $film->getReleaseDate(),
            "trailer" => $film->getTrailer(),
            "cover" => $film->getCover()
        ));
        $id = SQL::getPdo()->lastInsertId();
        $film->setId($id);
        $film->setActors([]);
        $film->setGallery([]);
    }

    public function addActors(bool|string $id, array $getActors)
    {
        foreach ($getActors as $actor) {
            $query = "INSERT INTO films_actors (id_film, id_actor,played_character) VALUES (:id_film, :id_actor, :played_character)";
            $stmt = SQL::getPdo()->prepare($query);
            $stmt->execute(array(
                "id_film" => $id,
                "id_actor" => $actor->getId(),
                "played_character" => $actor->getPlayedCharacter()
            ));
        }
    }

    public function removeAllActorsByFilmId($id)
    {
        $query = "DELETE FROM films_actors WHERE id_film = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
    }

    public function insertActorsForFilm($tabActors){
        foreach ($tabActors as $actor) {
            $query = "INSERT INTO films_actors (id_film, id_actor,played_character, updated_at) VALUES (:id_film, :id_actor, :played_character, NOW())";
            $stmt = SQL::getPdo()->prepare($query);
            $stmt->execute(array(
                "id_film" => $actor['id_film'],
                "id_actor" => $actor['id_actor'],
                "played_character" => $actor['played_character']
            ));
        }
    }

    public function addGallery(bool|string $id, array $getGallery)
    {
        foreach ($getGallery as $gallery) {
            $query = "INSERT INTO films_gallery (id_film, id_gallery, played_character) VALUES (:id_film, :id_gallery)";
            $stmt = SQL::getPdo()->prepare($query);
            $stmt->execute(array(
                "id_film" => $id,
                "id_gallery" => $gallery->getId()
            ));
        }
    }

    public function addGallerySingle(bool|string $id, $gallery)
    {
        $query = "INSERT INTO films_gallery (id_film, id_gallery) VALUES (:id_film, :id_gallery)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id_film" => $id,
            "id_gallery" => $gallery->getId()
        ));
    }

    public function addActor(int $id, $actor)
    {
        $query = "INSERT INTO films_actors (id_film, id_actor, played_character) VALUES (:id_film, :id_actor, :played_character)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id_film" => $id,
            "id_actor" => $actor->getId(),
            "played_character" => $actor->getPlayedCharacter()
        ));
    }

    public function updateFilm(Film $film)
    {
        $query = "UPDATE films SET name = :name, resume = :resume, synopsis = :synopsis, release_date = :release_date, trailer = :trailer, cover = :cover, banner = :banner, updated_at = :updated_at WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "name" => $film->getName(),
            "resume" => $film->getResume(),
            "synopsis" => $film->getSynopsis(),
            "release_date" => $film->getReleaseDate(),
            "trailer" => $film->getTrailer(),
            "cover" => $film->getCover(),
            "id" => $film->getId(),
            "banner" => $film->getBanner(),
            "updated_at" => $film->getUpdateDate()
        ));
    }

    public function deleteFilm($POST)
    {
        $id = $POST['id'];
        //delete all actors
        $query = "DELETE FROM films_actors WHERE id_film = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        //delete all gallery
        $query = "DELETE FROM films_gallery WHERE id_film = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        //delete all comments
        $query = "DELETE FROM comments WHERE id_film = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        $query = "DELETE FROM films WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
    }
}

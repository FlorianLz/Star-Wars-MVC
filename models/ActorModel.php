<?php

namespace models;

use models\base\SQL;
use models\classes\Actor;

class ActorModel extends SQL
{
    public function __construct()
    {
        parent::__construct('actors', 'id');
    }

    /**
     * Liste tous les acteurs
     * @return Actor[]
     */
    public function getAll(): array
    {
        $query = "SELECT actors.id as id,actors.name,GROUP_CONCAT(films_actors.played_character SEPARATOR ';') as played_character,GROUP_CONCAT(films.name SEPARATOR ';') as films_presence, actors.picture as picture FROM `films` JOIN films_actors ON films_actors.id_film = films.id JOIN actors ON actors.id = films_actors.id_actor GROUP BY actors.name";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
        foreach ($result as $actor) {
            $actor->setFilmsPresence(explode(';', $actor->getFilmsPresence()));
            $actor->setPlayedCharacter(explode(';', $actor->getPlayedCharacter()));
        }
        return $result;
    }

    public function getAllActorsAdmin(): array
    {
        $query = "SELECT actors.id as id, actors.name, GROUP_CONCAT(films_actors.played_character SEPARATOR ';') as played_character, GROUP_CONCAT(films.name SEPARATOR ';') as films_presence, actors.picture as picture 
        FROM `actors` 
        LEFT JOIN films_actors ON films_actors.id_actor = actors.id 
        LEFT JOIN films ON films.id = films_actors.id_film  
        GROUP BY actors.id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
        foreach ($result as $actor) {
            if($actor->getFilmsPresence() != null){
                $actor->setFilmsPresence(explode(';', $actor->getFilmsPresence()));
                $actor->setPlayedCharacter(explode(';', $actor->getPlayedCharacter()));
            }
        }
        return $result;
    }

    public function getAllActors(): array
    {
        $query = "SELECT * FROM actors";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
    }

    public function getRandomActors($nb): array
    {
        $query = "SELECT * FROM actors ORDER BY RAND() LIMIT $nb";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
    }

    public function addActor(Actor $actor)
    {
        $query = "INSERT INTO actors (name, picture) VALUES (:name, :picture)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "name" => $actor->getName(),
            "picture" => $actor->getPicture()
        ));
    }

    public function getActorById($string)
    {
        $query = "SELECT * FROM actors WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $string
        ));
        return $stmt->fetchObject(Actor::class);
    }

    public function delete($POST)
    {
        $id = $POST['id'];
        //delete from films_actors where id_actor = :id
        $query = "DELETE FROM films_actors WHERE id_actor = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        $query = "DELETE FROM actors WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));

    }

    public function updateActor(Actor $actor)
    {
        $query = "UPDATE actors SET name = :name, picture = :picture WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "name" => $actor->getName(),
            "picture" => $actor->getPicture(),
            "id" => $actor->getId()
        ));
    }
}

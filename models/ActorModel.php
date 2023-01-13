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
        $query = "SELECT actors.name,GROUP_CONCAT(DISTINCT actors.played_character SEPARATOR ';') as played_character,GROUP_CONCAT(films.name SEPARATOR ';') as films_presence FROM `films` JOIN films_actors ON films_actors.id_film = films.id JOIN actors ON actors.id = films_actors.id_actor GROUP BY actors.name";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
        foreach ($result as $actor) {
            $actor->setFilmsPresence(explode(';', $actor->getFilmsPresence()));
        }
        return $result;
    }
}

<?php

namespace models;

use models\base\SQL;
use models\classes\Gallery;

class GalleryModel extends SQL
{
    public function __construct()
    {
        parent::__construct('gallery', 'id');
    }

    /**
     * Liste toutes les images
     * @return Gallery[]
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM gallery";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Gallery::class);
    }

    public function addGallery(Gallery $gallery)
    {
        $query = "INSERT INTO gallery (name, url) VALUES (:name, :url)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "name" => $gallery->getName(),
            "url" => $gallery->getUrl()
        ));
        $gallery->setId(SQL::getPdo()->lastInsertId());
    }

    public function getAllGalleryByFilmId($id)
    {
        $query = "SELECT gallery.* FROM `films` JOIN films_gallery ON films_gallery.id_film = films.id JOIN gallery ON gallery.id = films_gallery.id_gallery WHERE films.id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Gallery::class);

    }

    public function deleteGallery($filmId, $imageId)
    {
        $query = "DELETE FROM films_gallery WHERE id_film = :id_film AND id_gallery = :id_gallery";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id_film" => $filmId,
            "id_gallery" => $imageId
        ));
    }

    public function deleteGalleryById($id)
    {
        $query = "DELETE FROM films_gallery WHERE id_gallery = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));

        $query = "DELETE FROM gallery WHERE id = :id";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute(array(
            "id" => $id
        ));
    }
}

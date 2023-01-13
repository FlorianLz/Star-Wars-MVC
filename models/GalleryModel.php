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
}

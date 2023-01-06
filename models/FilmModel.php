<?php
namespace models;

use models\base\SQL;

class FilmModel extends SQL
{
    public function __construct()
    {
        parent::__construct('films', 'id');
    }
}

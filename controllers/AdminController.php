<?php

namespace controllers;

use controllers\base\WebController;
use models\FilmModel;
use utils\Template;

class AdminController extends WebController
{
    private FilmModel $filmModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
    }
    function adminIndex(): string
    {
        return Template::render("views/admin/index.php",);
    }

    function adminFilms(): string
    {
        $films = $this->filmModel->getAll();
        return Template::render("views/admin/films.php", [
            "films" => $films
        ]);
    }
}

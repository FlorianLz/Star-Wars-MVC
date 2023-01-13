<?php
namespace controllers;

use controllers\base\WebController;
use models\classes\Film;
use models\FilmModel;
use utils\Template;

class FilmController extends WebController
{
    private FilmModel $filmModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
    }

    public function showFilms()
    {
        $films = $this->filmModel->getAll();
        return Template::render(
            "views/list/filmsList.php",
            array( "films" => $films)
        );
    }

    public function showFilm($id)
    {
        $film = $this->filmModel->getFilmById($id);
        $actors = $this->filmModel->getActorsByFilmId($id);
        $film->setActors($actors);
        return Template::render(
            "views/single/singleFilm.php",
            array( "film" => $film)
        );
    }
}

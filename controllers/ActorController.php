<?php

namespace controllers;

use controllers\base\WebController;
use models\ActorModel;
use models\GalleryModel;
use utils\Template;

class ActorController extends WebController
{
    private ActorModel $actorModel;

    public function __construct()
    {
        $this->actorModel = new ActorModel();
    }
    public function actors()
    {
        $actors = $this->actorModel->getAll();
        return Template::render("views/global/actors.php", array("actors" => $actors));
    }

}

<?php

namespace controllers;

use controllers\base\WebController;
use models\ActorModel;
use utils\Template;

class SampleWebController extends WebController
{
    private $actorModel;

    public function __construct()
    {
        $this->actorModel = new ActorModel();
    }

    function home(): string
    {
        $actors = $this->actorModel->getRandomActors(5);
        return Template::render("views/global/home.php", array("actors" => $actors));
    }

    function exemple($parametre = 'Valeur par défaut'): string
    {
        return "Voilà votre paramètre : $parametre";
    }
}

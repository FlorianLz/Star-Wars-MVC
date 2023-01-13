<?php

namespace controllers;

use controllers\base\WebController;
use models\GalleryModel;
use utils\Template;

class GalleryController extends WebController
{
    private GalleryModel $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }
    public function gallery()
    {
        $galleries = $this->galleryModel->getAll();
        return Template::render("views/global/gallery.php", array("galleries" => $galleries));
    }

}

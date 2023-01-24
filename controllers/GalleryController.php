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
    public function gallery(): string
    {
        $galleries = $this->galleryModel->getAll();
        return Template::render("views/global/gallery.php", array("galleries" => $galleries));
    }

    public function adminGalleryPage(): string
    {
        $galleries = $this->galleryModel->getAll();
        return Template::render("views/admin/gallery.php", array("galleries" => $galleries));
    }

    public function deleteGalleryById($id)
    {
        $this->galleryModel->deleteGalleryById($id);
    }

}

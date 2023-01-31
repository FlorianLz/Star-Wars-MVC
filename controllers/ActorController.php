<?php

namespace controllers;

use controllers\base\WebController;
use models\ActorModel;
use models\classes\Actor;
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
        return Template::render("views/global/actors.php", array("actors" => $actors, "admin" => false));
    }

    public function adminActors()
    {
        $actors = $this->actorModel->getAllActorsAdmin();
        return Template::render("views/global/actors.php", array("actors" => $actors, "admin" => true));
    }

    public function deleteActor($id)
    {
        $this->actorModel->delete($_POST);
        header("Location: /admin/actors");
    }

    public function addActorPage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->addActor($_POST, $_FILES);
        } else {
            return Template::render("views/admin/addActor.php");
        }
    }

    private function addActor($params,$files)
    {
        $actor = new Actor();
        $actor->setName($params['name']);
        //upload picture image $_FILES['picture']
        if ($files['picture']['name'] == "") {
            $actor->setPicture('public/images/actors/default.jpg');
        }else{
            //upload picture
            $picture = $files['picture'];
            $pictureName = $picture['name'];
            $pictureTmpName = $picture['tmp_name'];
            $pictureSize = $picture['size'];
            $pictureError = $picture['error'];
            $pictureType = $picture['type'];
            $pictureExt = explode('.', $pictureName);
            $pictureActualExt = strtolower(end($pictureExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($pictureActualExt, $allowed)) {
                if ($pictureError === 0) {
                    if ($pictureSize < 1000000) {
                        $pictureNameNew = uniqid('', true) . "." . $pictureActualExt;
                        $pictureDestination = 'public/images/actors/' . $pictureNameNew;
                        move_uploaded_file($pictureTmpName, $pictureDestination);
                        $actor->setPicture($pictureDestination);
                    } else {
                        $actor->setPicture('public/images/actors/default.jpg');
                    }
                } else {
                    $actor->setPicture('public/images/actors/default.jpg');
                }
            } else {
                $actor->setPicture('public/images/actors/default.jpg');
            }
        }
        $this->actorModel->addActor($actor);
        header("Location: /admin/actors");

    }

    public function updateActorPage($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->updateActor($_POST, $_FILES);
        } else {
            $actor = $this->actorModel->getActorById($id);
            return Template::render("views/admin/updateActor.php", array("actor" => $actor));
        }
    }

    private function updateActor($params, $files)
    {
        var_dump($files);
        $actor = new Actor();
        $actor->setId($params['idActor']);
        $actor->setName($params['actorName']);
        //upload picture image $_FILES['picture']
        if ($files['picture']['name'] == "") {
            $actor->setPicture($params['oldPicture']);
        }else{
            //upload picture
            $picture = $files['picture'];
            $pictureName = $picture['name'];
            $pictureTmpName = $picture['tmp_name'];
            $pictureSize = $picture['size'];
            $pictureError = $picture['error'];
            $pictureType = $picture['type'];
            $pictureExt = explode('.', $pictureName);
            $pictureActualExt = strtolower(end($pictureExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($pictureActualExt, $allowed)) {
                if ($pictureError === 0) {
                    if ($pictureSize < 1000000) {
                        $pictureNameNew = uniqid('', true) . "." . $pictureActualExt;
                        $pictureDestination = 'public/images/actors/' . $pictureNameNew;
                        move_uploaded_file($pictureTmpName, $pictureDestination);
                        $actor->setPicture('/'.$pictureDestination);
                    } else {
                        $actor->setPicture($params['oldpicture']);
                    }
                } else {
                    $actor->setPicture($params['oldpicture']);
                }
            } else {
                $actor->setPicture($params['oldpicture']);
            }
        }
        $this->actorModel->updateActor($actor);
        var_dump($files);
        header("Location: /admin/actors");
    }

}

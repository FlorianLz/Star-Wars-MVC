<?php

namespace controllers;

use controllers\base\WebController;
use models\ActorModel;
use models\classes\Actor;
use models\classes\Comment;
use models\classes\Film;
use models\classes\Gallery;
use models\CommentModel;
use models\FilmModel;
use models\GalleryModel;
use utils\Template;

class FilmController extends WebController
{
    private FilmModel $filmModel;
    private ActorModel $actorModel;
    private GalleryModel $galleryModel;
    private $commentModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
        $this->actorModel = new ActorModel();
        $this->galleryModel = new GalleryModel();
        $this->commentModel = new CommentModel();
    }

    public function showFilms()
    {
        $films = $this->filmModel->getAll();
        return Template::render(
            "views/list/filmsList.php",
            array("films" => $films)
        );
    }

    public function showFilm($id)
    {
        $film = $this->filmModel->getFilmById($id);
        $actors = $this->filmModel->getActorsByFilmId($id);
        $gallery = $this->filmModel->getGalleryByFilmId($id);
        $comments = $this->commentModel->getCommentsByFilmId($id);
        foreach ($comments as $comment) {
            $comment->setAuthorInfos($this->commentModel->getUserInfosByCommentId($comment->getId()));
        }
        $film->setActors($actors);
        $film->setGallery($gallery);
        $film->setComments($comments);
        return Template::render(
            "views/single/singleFilm.php",
            array("film" => $film)
        );
    }

    public function addFilmPage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->addFilm($_POST, $_FILES);
        } else {
            $actors = $this->actorModel->getAllActors();
            return Template::render(
                "views/admin/addFilm.php",
                array("actors" => $actors)
            );
        }
    }

    private function addFilm($params, $files)
    {
        $film = new Film();
        $film->setName($params['name']);
        $film->setResume($params['resume']);
        $film->setSynopsis($params['synopsis']);
        $film->setReleaseDate($params['release_date']);
        $film->setTrailer($params['trailer']);

        //upload cover
        $cover = $files['cover'];
        $coverName = $cover['name'];
        $coverTmpName = $cover['tmp_name'];
        $coverSize = $cover['size'];
        $coverError = $cover['error'];
        $coverExt = explode('.', $coverName);
        $coverActualExt = strtolower(end($coverExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($coverActualExt, $allowed)) {
            if ($coverError === 0) {
                if ($coverSize < 1000000) {
                    $coverNameNew = uniqid('', true) . "." . $coverActualExt;
                    $coverDestination = 'public/images/covers/' . $coverNameNew;
                    move_uploaded_file($coverTmpName, $coverDestination);
                    $film->setCover($coverDestination);
                } else {
                    $film->setCover('public/images/covers/default.jpg');
                }
            } else {
                $film->setCover('public/images/covers/default.jpg');
            }
        } else {
            $film->setCover('public/images/covers/default.jpg');
        }

        //upload banner
        $banner = $files['banner'];
        $bannerName = $banner['name'];
        $bannerTmpName = $banner['tmp_name'];
        $bannerSize = $banner['size'];
        $bannerError = $banner['error'];
        $bannerExt = explode('.', $bannerName);
        $bannerActualExt = strtolower(end($bannerExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($bannerActualExt, $allowed)) {
            if ($bannerError === 0) {
                if ($bannerSize < 1000000) {
                    $bannerNameNew = uniqid('', true) . "." . $bannerActualExt;
                    $bannerDestination = 'public/images/banners/' . $bannerNameNew;
                    move_uploaded_file($bannerTmpName, $bannerDestination);
                    $film->setBanner($bannerDestination);
                } else {
                    $film->setBanner('public/images/banners/default.jpg');
                }
            } else {
                $film->setBanner('public/images/banners/default.jpg');
            }
        } else {
            $film->setBanner('public/images/banners/default.jpg');
        }

        $this->filmModel->addFilm($film);


        $gallery = $files['gallery'];
        for ($i = 0; $i < count($gallery['name']); $i++) {
            $galleryName = $gallery['name'][$i];
            $galleryTmpName = $gallery['tmp_name'][$i];
            $gallerySize = $gallery['size'][$i];
            $galleryError = $gallery['error'][$i];
            $galleryExt = explode('.', $galleryName);
            $galleryActualExt = strtolower(end($galleryExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($galleryActualExt, $allowed)) {
                if ($galleryError === 0) {
                    if ($gallerySize < 1000000) {
                        $galleryNameNew = uniqid('', true) . "." . $galleryActualExt;
                        $galleryDestination = 'public/images/gallery/' . $galleryNameNew;
                        move_uploaded_file($galleryTmpName, $galleryDestination);
                        $gall = new Gallery();
                        $gall->setUrl($galleryDestination);
                        $gall->setName($galleryNameNew);
                        $this->galleryModel->addGallery($gall);
                        $film->addGallery($gall);
                    } else {
                        $gall = new Gallery();
                        $gall->setName('Photo par défaut');
                        $gall->setUrl('public/images/gallery/default.jpg');
                        $this->galleryModel->addGallery($gall);
                        $film->addGallery($gall);
                    }
                } else {
                    $gall = new Gallery();
                    $gall->setName('Photo par défaut');
                    $gall->setUrl('public/images/gallery/default.jpg');
                    $this->galleryModel->addGallery($gall);
                    $film->addGallery($gall);
                }
            } else {
                $gall = new Gallery();
                $gall->setUrl('public/images/gallery/default.jpg');
                $gall->setName('Photo par défaut');
                $this->galleryModel->addGallery($gall);
                $film->addGallery($gall);
            }
        }

        for ($i = 1; $i < $params['nbActors']; $i++) {
            $actor = $this->actorModel->getActorById($params['actor' . $i]);
            $actor->setPlayedCharacter($params['actor' . $i . 'character']);
            $film->addActor($actor);
        }

        $this->filmModel->addActors($film->getId(), $film->getActors());
        $this->filmModel->addGallery($film->getId(), $film->getGallery());

        if ($film->getId() !== null) {
            header("Location: /film/" . $film->getId());
        }
    }

    public function updateFilmPage($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->updateFilm($id, $_POST, $_FILES);
        } else {
            $film = $this->filmModel->getFilmById($id);
            $actors = $this->filmModel->getActorsByFilmId($id);
            $gallery = $this->filmModel->getGalleryByFilmId($id);
            $film->setActors($actors);
            $film->setGallery($gallery);
            $allActors = $this->actorModel->getAllActors();
            $allGallery = $this->galleryModel->getAllGalleryByFilmId($id);
            //var_dump($allActors);
            return Template::render(
                "views/admin/updateFilm.php",
                array("film" => $film, "allActors" => $allActors, "allActorsForFilm" => $actors, "allGallery" => $allGallery)
            );
        }
    }

    private function updateFilm($id, $params, $files)
    {

        for ($i=0; $i < $params['nbActors']-1; $i++) {
            $params['tabActors'][$i]['id_film'] = $id;
            $params['tabActors'][$i]['id_actor'] = $params['actor'.$i+1];
            $params['tabActors'][$i]['played_character'] = $params['actor'. $i+1 .'character'];
        }
        echo json_encode($params);
        $this->filmModel->removeAllActorsByFilmId($id);
        $this->filmModel->insertActorsForFilm($params['tabActors']);

        $film = $this->filmModel->getFilmById($id);
        $film->setName($params['name']);
        $film->setSynopsis($params['synopsis']);
        $film->setReleaseDate($params['release_date']);
        $film->setResume($params['resume']);
        $film->setTrailer($params['trailer']);
        $film->setUpdateDate(date("Y-m-d H:i:s"));

        if ($files['cover']['name'] == "") {
            $film->setCover($params['oldCover']);
        } else {
            //upload cover
            $cover = $files['cover'];
            $coverName = $cover['name'];
            $coverTmpName = $cover['tmp_name'];
            $coverSize = $cover['size'];
            $coverError = $cover['error'];
            $coverExt = explode('.', $coverName);
            $coverActualExt = strtolower(end($coverExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($coverActualExt, $allowed)) {
                if ($coverError === 0) {
                    if ($coverSize < 1000000) {
                        $coverNameNew = uniqid('', true) . "." . $coverActualExt;
                        $coverDestination = 'public/images/covers/' . $coverNameNew;
                        move_uploaded_file($coverTmpName, $coverDestination);
                        $film->setCover($coverDestination);
                    } else {
                        $film->setCover('public/images/covers/default.jpg');
                    }
                } else {
                    $film->setCover('public/images/covers/default.jpg');
                }
            } else {
                $film->setCover('public/images/covers/default.jpg');
            }
        }
        if($files['banner']['name'] == ""){
            $film->setBanner($params['oldBanner']);
        }else{
            //upload banner
            $banner = $files['banner'];
            $bannerName = $banner['name'];
            $bannerTmpName = $banner['tmp_name'];
            $bannerSize = $banner['size'];
            $bannerError = $banner['error'];
            $bannerExt = explode('.', $bannerName);
            $bannerActualExt = strtolower(end($bannerExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($bannerActualExt, $allowed)) {
                if ($bannerError === 0) {
                    if ($bannerSize < 1000000) {
                        $bannerNameNew = uniqid('', true) . "." . $bannerActualExt;
                        $bannerDestination = 'public/images/banners/' . $bannerNameNew;
                        move_uploaded_file($bannerTmpName, $bannerDestination);
                        $film->setBanner($bannerDestination);
                    } else {
                        $film->setBanner('public/images/banners/default.jpg');
                    }
                } else {
                    $film->setBanner('public/images/banners/default.jpg');
                }
            } else {
                $film->setBanner('public/images/banners/default.jpg');
            }
        }

        $gallery = $files['gallery'];
        if($gallery['name'][0] != ""){
            for ($i = 0; $i < count($gallery['name']); $i++) {
                $params['tabGallery'][$i]['id_film'] = $id;
                $galleryName = $gallery['name'][$i];
                $galleryTmpName = $gallery['tmp_name'][$i];
                $gallerySize = $gallery['size'][$i];
                $galleryError = $gallery['error'][$i];
                $galleryExt = explode('.', $galleryName);
                $galleryActualExt = strtolower(end($galleryExt));
                $allowed = array('jpg', 'jpeg', 'png');
                if (in_array($galleryActualExt, $allowed)) {
                    if ($galleryError === 0) {
                        if ($gallerySize < 1000000) {
                            $galleryNameNew = uniqid('', true) . "." . $galleryActualExt;
                            $galleryDestination = 'public/images/gallery/' . $galleryNameNew;
                            move_uploaded_file($galleryTmpName, $galleryDestination);
                            $gall = new Gallery();
                            $gall->setUrl($galleryDestination);
                            $gall->setName($galleryNameNew);
                            $this->galleryModel->addGallery($gall);
                            $film->addGallery($gall);
                        } else {
                            $gall = new Gallery();
                            $gall->setName('Photo par défaut');
                            $gall->setUrl('public/images/gallery/default.jpg');
                            $this->galleryModel->addGallery($gall);
                            $film->addGallery($gall);
                        }
                    } else {
                        $gall = new Gallery();
                        $gall->setName('Photo par défaut');
                        $gall->setUrl('public/images/gallery/default.jpg');
                        $this->galleryModel->addGallery($gall);
                        $film->addGallery($gall);
                    }
                } else {
                    $gall = new Gallery();
                    $gall->setUrl('public/images/gallery/default.jpg');
                    $gall->setName('Photo par défaut');
                    $this->galleryModel->addGallery($gall);
                    $film->addGallery($gall);
                }
            }
        }

        //Gestion de la suppression des photos de la galerie
        $removeImages = $params['removeImages'];
        if($removeImages != null){
            $split = explode(",", $removeImages);
            for($i = 0; $i < count($split); $i++){
                $this->galleryModel->deleteGallery($film->getId(),$split[$i]);
            }
        }

        $this->filmModel->updateFilm($film);
        header("Location: /admin/films/update/" . $film->getId());
    }

    public function deleteFilm($id)
    {
        $this->filmModel->deleteFilm($id);
    }

    public function addComment(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $comment = new Comment();
            $comment->setAuthor($_SESSION['LOGIN']['id']);
            $comment->setFilmId($_POST['idFilm']);
            $comment->setComment($_POST['comment']);
            $this->commentModel->addComment($comment);
            header("Location: /film/" . $_POST['idFilm']);
        }
    }
}

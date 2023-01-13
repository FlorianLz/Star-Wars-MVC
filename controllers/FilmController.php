<?php
namespace controllers;

use controllers\base\WebController;
use models\ActorModel;
use models\classes\Actor;
use models\classes\Film;
use models\classes\Gallery;
use models\FilmModel;
use models\GalleryModel;
use utils\Template;

class FilmController extends WebController
{
    private FilmModel $filmModel;
    private ActorModel $actorModel;
    private GalleryModel $galleryModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
        $this->actorModel = new ActorModel();
        $this->galleryModel = new GalleryModel();
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
        $gallery = $this->filmModel->getGalleryByFilmId($id);
        $film->setActors($actors);
        $film->setGallery($gallery);
        return Template::render(
            "views/single/singleFilm.php",
            array( "film" => $film)
        );
    }

    public function addFilmPage(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->addFilm($_POST,$_FILES);
        }else{
            $actors = $this->actorModel->getAllActors();
            return Template::render(
                "views/admin/addFilm.php",
                array( "actors" => $actors)
            );
        }
    }

    private function addFilm($params,$files)
    {
        var_dump($params);
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
        $coverType = $cover['type'];
        $coverExt = explode('.', $coverName);
        $coverActualExt = strtolower(end($coverExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($coverActualExt, $allowed)){
            if($coverError === 0){
                if($coverSize < 1000000){
                    $coverNameNew = uniqid('', true).".".$coverActualExt;
                    $coverDestination = 'public/images/covers/'.$coverNameNew;
                    move_uploaded_file($coverTmpName, $coverDestination);
                    $film->setCover($coverDestination);
                }else{
                    $film->setCover('public/images/covers/default.jpg');
                }
            }else{
                $film->setCover('public/images/covers/default.jpg');
            }
        }else{
            $film->setCover('public/images/covers/default.jpg');
        }
        //upload all gallery images foreach
        $this->filmModel->addFilm($film);


        $gallery = $files['gallery'];
        for ($i=0; $i < count($gallery['name']); $i++){
            $galleryName = $gallery['name'][$i];
            $galleryTmpName = $gallery['tmp_name'][$i];
            $gallerySize = $gallery['size'][$i];
            $galleryError = $gallery['error'][$i];
            $galleryType = $gallery['type'][$i];
            $galleryExt = explode('.', $galleryName);
            $galleryActualExt = strtolower(end($galleryExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if(in_array($galleryActualExt, $allowed)){
                if($galleryError === 0){
                    if($gallerySize < 1000000){
                        $galleryNameNew = uniqid('', true).".".$galleryActualExt;
                        $galleryDestination = 'public/images/gallery/'.$galleryNameNew;
                        move_uploaded_file($galleryTmpName, $galleryDestination);
                        $gall = new Gallery();
                        $gall->setUrl($galleryDestination);
                        $gall->setName($galleryNameNew);
                        $this->galleryModel->addGallery($gall);
                        $film->addGallery($gall);
                    }else{
                        $gall = new Gallery();
                        $gall->setName('Photo par défaut');
                        $gall->setUrl('public/images/gallery/default.jpg');
                        $this->galleryModel->addGallery($gall);
                        $film->addGallery($gall);
                    }
                }else{
                    $gall = new Gallery();
                    $gall->setName('Photo par défaut');
                    $gall->setUrl('public/images/gallery/default.jpg');
                    $this->galleryModel->addGallery($gall);
                    $film->addGallery($gall);
                }
            }else{
                $gall = new Gallery();
                $gall->setUrl('public/images/gallery/default.jpg');
                $gall->setName('Photo par défaut');
                $this->galleryModel->addGallery($gall);
                $film->addGallery($gall);
            }
        }

        for($i = 1; $i < $params['nbActors']; $i++){
            $actor = $this->actorModel->getActorById($params['actor'.$i]);
            $actor->setPlayedCharacter($params['actor'.$i.'character']);
            $film->addActor($actor);
        }

        $this->filmModel->addActors($film->getId(), $film->getActors());
        $this->filmModel->addGallery($film->getId(), $film->getGallery());

        if($film->getId() !== null){
            header("Location: /film/".$film->getId());
        }
    }
}

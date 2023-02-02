<?php

namespace routes;

use controllers\ActorController;
use controllers\AdminController;
use controllers\AuthController;
use controllers\FilmController;
use controllers\GalleryController;
use controllers\SampleWebController;
use routes\base\Route;
use utils\SessionHelpers;
use utils\Template;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $authController = new AuthController();
        $filmController = new FilmController();
        $galleryController = new GalleryController();
        $actorController = new ActorController();
        $adminController = new AdminController();

        Route::Add('/', [$main, 'home']);
        Route::Add('/films', [$filmController, 'showFilms']);
        Route::Add('/film/{id}', [$filmController, 'showFilm']);
        Route::Add('/galerie', [$galleryController, 'gallery']);
        Route::Add('/actors', [$actorController, 'actors']);
        Route::Add('/films/addComment', [$filmController, 'addComment']);

        if (SessionHelpers::isLogin() && SessionHelpers::isAdmin()) {
            Route::Add('/logout', [$authController, 'logout']);
            Route::Add('/admin', [$adminController, 'adminFilms']);
            Route::Add('/admin/films', [$adminController, 'adminFilms']);
            Route::Add('/admin/films/add', [$filmController, 'addFilmPage']);
            Route::Add('/admin/films/update/{id}', [$filmController, 'updateFilmPage']);
            Route::Add('/admin/films/delete/{id}', [$filmController, 'deleteFilm']);
            Route::Add('/admin/actors', [$actorController, 'adminActors']);
            Route::Add('/admin/actors/add', [$actorController, 'addActorPage']);
            Route::Add('/admin/actors/update/{id}', [$actorController, 'updateActorPage']);
            Route::Add('/admin/actors/delete/{id}', [$actorController, 'deleteActor']);
            Route::Add('/admin/galerie', [$galleryController, 'adminGalleryPage']);
            Route::Add('/admin/galerie/delete/{id}', [$galleryController, 'deleteGalleryById']);

        } else {
            Route::Add('/login', [$authController, 'login']);
            Route::Add('/register', [$authController, 'register']);
            if(SessionHelpers::isLogin()) {
                Route::Add('/admin', [$main, 'home']);
                Route::Add('/logout', [$authController, 'logout']);
            }else {
                Route::Add('/admin', [$authController, 'login']);
            }
        }
    }
}


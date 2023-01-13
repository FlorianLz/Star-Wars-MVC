<?php

namespace routes;

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

        Route::Add('/', [$main, 'home']);
        Route::Add('/films', [$filmController, 'showFilms']);
        Route::Add('/film/{id}', [$filmController, 'showFilm']);
        Route::Add('/gallery', [$galleryController, 'gallery']);
        Route::Add('/actors}', [$main, 'exemple']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/logout', [$authController, 'logout']);
        } else {
            Route::Add('/login', [$authController, 'login']);
            Route::Add('/register', [$authController, 'register']);
        }
    }
}


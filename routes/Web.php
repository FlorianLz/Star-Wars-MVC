<?php

namespace routes;

use controllers\AuthController;
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

        Route::Add('/', [$main, 'home']);
        Route::Add('/films', [$main, 'exemple']);
        Route::Add('/film/{id}', [$main, 'exemple']);
        Route::Add('/gallery', [$main, 'exemple']);
        Route::Add('/actors}', [$main, 'exemple']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/logout', [$authController, 'logout']);
        } else {
            Route::Add('/login', [$authController, 'login']);
            Route::Add('/register', [$authController, 'register']);
        }
    }
}


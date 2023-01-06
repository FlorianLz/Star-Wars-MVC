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
        Route::Add('/exemple', [$main, 'exemple']);
        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

        if (SessionHelpers::isLogin()) {
            Route::Add('/logout', [$authController, 'logout']);
        } else {
            Route::Add('/login', [$authController, 'login']);
            Route::Add('/register', [$authController, 'register']);
        }
    }
}


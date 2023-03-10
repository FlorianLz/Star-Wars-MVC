<?php


namespace utils;


class SessionHelpers
{
    public function __construct()
    {
        SessionHelpers::init();
    }

    static function init(): void
    {
        session_start();
    }

    static function login(mixed $equipe): void
    {
        //$_SESSION['LOGIN'] = $equipe;
        $_SESSION['LOGIN']['prenom'] = $equipe->getPrenom();
        $_SESSION['LOGIN']['id'] = $equipe->getId();
        if ($equipe->isAdmin()) {
            $_SESSION['LOGIN']['role'] = 'admin';
        } else {
            $_SESSION['LOGIN']['role'] = 'user';
        }
    }

    static function logout(): void
    {
        unset($_SESSION['LOGIN']);
    }

    static function getConnected(): mixed
    {
        if (SessionHelpers::isLogin()) {
            return $_SESSION['LOGIN'];
        } else {
            return array();
        }
    }

    static function isLogin(): bool
    {
        return isset($_SESSION['LOGIN']);
    }

    static function isInBackOffice(): bool
    {
        if(strpos($_SERVER['REQUEST_URI'], '/admin') !== false) {
            return true;
        } else {
            return false;
        }
    }

    static function isAdmin(): bool
    {
        return $_SESSION['LOGIN']['role'] == 'admin';
    }
}

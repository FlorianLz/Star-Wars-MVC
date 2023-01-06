<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini MVC Sample</title>
    <link rel="stylesheet" href="./public/style/main.css">
</head>

<body>
<nav>
    <div>
        <a href="/">Mini MVC Sample</a>
        <ul>
            <?php

            use utils\SessionHelpers;

            if (SessionHelpers::isLogin()) {
                echo '<li><a href="/me">Mon compte</a></li>';
                echo ' <li><a href="/logout">Logout</a></li>';
            } else {
                echo '<li><a href="/login">Login</a></li>';
                echo '<li><a href="/register">Register</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini MVC Sample</title>
    <link rel="stylesheet" href="/public/style/main.css">
</head>

<body>
<?php use utils\SessionHelpers;

if (SessionHelpers::isInBackOffice()) { ?>
    <header class="sidebar">
        <div class="header">
            <h2>Star Wars MVC</h2>
        </div>
        <ul>
            <li><a href="/">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                    </svg>Voir le site</a></li>
            <li>
                <a href="/admin/films">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M9,4C9,2.89 9.89,2 11,2C12.11,2 13,2.89 13,4C13,5.11 12.11,6 11,6C9.89,6 9,5.11 9,4M16,13C16,11.89 15.11,11 14,11C12.89,11 12,11.89 12,13C12,14.11 12.89,15 14,15C15.11,15 16,14.11 16,13M7,20C5.89,20 5,19.11 5,18C5,16.89 5.89,16 7,16C8.11,16 9,16.89 9,18C9,19.11 8.11,20 7,20M14,20C12.89,20 12,19.11 12,18C12,16.89 12.89,16 14,16C15.11,16 16,16.89 16,18C16,19.11 15.11,20 14,20M7,10C5.89,10 5,9.11 5,8C5,6.89 5.89,6 7,6C8.11,6 9,6.89 9,8C9,9.11 8.11,10 7,10M17,5C19.21,5 21,6.79 21,9C21,11.21 19.21,13 17,13C14.79,13 13,11.21 13,9C13,6.79 14.79,5 17,5Z"/>
                    </svg>
                    Gestion des films
                </a>
            </li>
            <li>
                <a href="/admin/actors">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"/>
                    </svg>
                    Gestion des acteurs
                </a>
            </li>
            <li>
                <a href="/admin/galerie">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 19q-.825 0-1.412-.587Q1 17.825 1 17V7q0-.825.588-1.412Q2.175 5 3 5h10q.825 0 1.413.588Q15 6.175 15 7v10q0 .825-.587 1.413Q13.825 19 13 19Zm15-8q-.425 0-.712-.288Q17 10.425 17 10V6q0-.425.288-.713Q17.575 5 18 5h4q.425 0 .712.287Q23 5.575 23 6v4q0 .425-.288.712Q22.425 11 22 11ZM4 15h8l-2.625-3.5L7.5 14l-1.375-1.825Zm14 4q-.425 0-.712-.288Q17 18.425 17 18v-4q0-.425.288-.713Q17.575 13 18 13h4q.425 0 .712.287q.288.288.288.713v4q0 .425-.288.712Q22.425 19 22 19Z"/></svg>
                    Gestion de la galerie photo
                </a>
            </li>
        </ul>
    </header>

<?php } else { ?>
    <header class="header">
        <div class="container">
            <nav class="header--content">
                <a class="header--content_items" href="/films">Films</a>
                <a class="header--content_items" href="/actors">Acteurs</a>
                <a class="header--content_items" href="/galerie">Galerie</a>
                <a class="header--content_items" href="/"><img class="header--logo" src="/public/images/logo.png" alt="star wars"></a>
                <?php

                if (SessionHelpers::isLogin()) {
                    if(SessionHelpers::isAdmin()){
                        echo '<a class="header--content_items" href="/admin">Back-office</a>';
                    }
                    echo '<a class="header--content_items" href="/logout">Logout</a>';

                } else {
                    echo '<a class="header--content_items" href="/login">Login</a>';
                    echo '<a class="header--content_items" href="/register">Register</a>';
                }
                ?>
            </nav>
            <button type="button" id="megamenu-mobile" class="navbar-toggle collapsed" data-toggle="collapse" aria-label="Navigation mobile">
                <span class="one" aria-hidden="true"></span>
                <span class="two" aria-hidden="true"></span>
                <span class="three" aria-hidden="true"></span>
            </button>
        </div>
    </header>
<?php }
if(SessionHelpers::isInBackOffice()){

?>
<div id="content-bo">
<?php }else{
    ?>
    <div id="content">
    <?php
} ?>



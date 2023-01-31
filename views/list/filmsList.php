<?php

use utils\SessionHelpers;

if (SessionHelpers::isInBackOffice()) { ?>
    <a href="/admin/films/add">Ajouter un film</a>
    <div class="movie-list">
        <?php foreach ($films as $film) { ?>
            <div class="movie-card" data-id="<?= $film->getId() ?>">
                <img src="/<?= $film->getCover() ?>" class="cover" alt="<?= $film->getName() ?>">
                <h3 class="title"><?= $film->getName() ?></h3>
                <p class="date">Sortie : <?= $film->getReleaseDate() ?></p>
                <div class="icons">
                    <a href="/admin/films/update/<?= $film->getId() ?>">
                        <svg class="icon edit" viewBox="0 0 24 24">
                            <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"/>
                        </svg>
                    </a>
                    <svg data-id="<?= $film->getId() ?>" class="icon delete" viewBox="0 0 24 24">
                        <path data-id="<?= $film->getId() ?>"
                              d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                    </svg>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="delete-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Êtes-vous sûr de vouloir supprimer ce film ?</p>
            <button class="confirm-delete">Supprimer</button>
            <button class="cancel-delete">Annuler</button>
        </div>
    </div>

<?php } else {
    $nbFilms = 0;?>
    <section class="banner default">
        <div class="container">
            <div class="banner--content">
                <h1 class="title">Les films</h1>
                <img class="banner--image" src="/public/images/bannerDefault.png" alt="banniere">
            </div>
        </div>
    </section>
    <?php foreach ($films as $film) { ?>


        <section class="film <?= $nbFilms % 2 != 0 ? 'reverse' : '' ?>">
            <div class="container">
                <div class="film--content">
                    <div class="film--content__left">
                        <img class="film--content_image" src="/<?= $film->getCover() ?>" alt="<?= $film->getName() ?>">
                    </div>
                    <div class="film--content__right">
                        <h2 class="subtitle--variant"><?= $film->getName() ?></h2>
                        <p class="film--content_date"><?= $film->getReleaseDate() ?></p>
                        <p class="film--content_synopsis"><?= $film->getSynopsis() ?></p>
                        <div class="film--content_link">
                            <a class="generic-cta" href="/film/<?= $film->getId() ?>">Plus d'infos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php $nbFilms++;
    }
} ?>

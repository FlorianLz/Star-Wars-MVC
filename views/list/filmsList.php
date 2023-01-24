<?php
use utils\SessionHelpers;
if(SessionHelpers::isInBackOffice()) { ?>
    <div class="movie-list">
        <?php foreach ($films as $film) { ?>
        <div class="movie-card" data-id="<?= $film->getId() ?>">
            <img src="/<?= $film->getCover() ?>" class="cover" alt="<?= $film->getName() ?>">
            <h3 class="title"><?= $film->getName() ?></h3>
            <p class="date">Sortie : <?= $film->getReleaseDate() ?></p>
            <div class="icons">
                <a href="/admin/films/update/<?= $film->getId() ?>"><svg class="icon edit" viewBox="0 0 24 24"><path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg></a>
                <svg data-id="<?= $film->getId() ?>" class="icon delete" viewBox="0 0 24 24"><path data-id="<?= $film->getId() ?>" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
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

    <?php
}else{
    ?>
    <a href="/login">Se connecter</a>
    <?php
foreach ($films as $film) {
    ?>
    <h1><?= $film->getName() ?></h1>
    <p><?= $film->getReleaseDate() ?></p>
    <p><?= $film->getSynopsis() ?></p>
    <img src="<?= $film->getCover() ?>" alt="<?= $film->getName() ?>">

<?php
}
}

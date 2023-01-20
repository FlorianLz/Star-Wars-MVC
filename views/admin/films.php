<?php
foreach ($films as $film) {
    ?>
    <h1><?= $film->getName() ?></h1>
    <p><?= $film->getReleaseDate() ?></p>
    <p><?= $film->getSynopsis() ?></p>
    <img src="<?= $film->getCover() ?>" alt="<?= $film->getName() ?>">
    <form action="/admin/films/delete/<?= $film->getId() ?>" method="POST">
        <input type="hidden" name="id" value="<?= $film->getId() ?>">
        <input type="submit" value="Supprimer">
    </form>

    <?php
}

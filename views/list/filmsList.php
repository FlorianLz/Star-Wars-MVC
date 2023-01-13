<?php
foreach ($films as $film) {
    ?>
    <h1><?= $film->getName() ?></h1>
    <p><?= $film->getReleaseDate() ?></p>
    <p><?= $film->getSynopsis() ?></p>
    <img src="<?= $film->getCover() ?>" alt="<?= $film->getName() ?>">

<?php
}

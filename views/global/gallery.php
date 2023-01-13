<h1>Gallerie</h1>
<?php
foreach ($galleries as $gallery) {
    ?>
    <img src="<?= $gallery->getUrl() ?>" alt="<?= $gallery->getName() ?>">
    <?php
}

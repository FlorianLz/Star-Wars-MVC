<h1><?= $film->getName() ?></h1>
<img src="<?= $film->getBanner() ?>" alt="<?= $film->getBanner() ?>">
<p><?= $film->getResume() ?></p>
<img src="/<?= $film->getCover() ?>" alt="<?= $film->getName() ?>">
<iframe width="560" height="315" src="<?= $film->getTrailer() ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<h2>Actors</h2>
<?php
foreach ($film->getActors() as $actor) {
    ?>
    <p><?= $actor->getName() ?></p>
    <p><?= $actor->getPlayedCharacter() ?></p>
    <img src="/<?= $actor->getPicture() ?>" alt="<?= $actor->getName() ?>">
    <?php
}
?>

<h2>Gallery</h2>
<?php
foreach ($film->getGallery() as $gallery) {
    ?>
    <img src="/<?= $gallery->getUrl() ?>" alt="<?= $gallery->getName() ?>">
    <?php
} ?>

<h2>Commentaires</h2>
<?php
foreach ($film->getComments() as $comment) {
    ?>
    <p><?= $comment->getComment() ?></p>
    <p><?= $comment->getAuthorInfos()->getPrenom() ?></p>
    <?php
} ?>


<form action="/admin/films/addComment" method="POST">
    <textarea type="text" name="comment" placeholder="Commentaire..."></textarea>
    <input type="hidden" name="idFilm" value="<?= $film->getId() ?>">
    <input type="submit" value="Ajouter un commentaire">
</form>

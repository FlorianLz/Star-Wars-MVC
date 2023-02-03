<h1>Ajouter un film</h1>
<form method="POST" action="/admin/films/update/<?= $film->getId() ?>" enctype="multipart/form-data" id="updateFilm">
    <label for="name">Titre du film</label>
    <input type="text" id="name" name="name" placeholder="Titre du film..." value="<?= $film->getName() ?>">
    <label for="resume">Résumé du film</label>
    <input type="text" id="resume" name="resume" placeholder="Résumé du film..." value="<?= $film->getResume() ?>">
    <label for="synopsis">Synopsis du film</label>
    <input type="text" id="synopsis" name="synopsis" placeholder="Synopsis du film..."
           value="<?= $film->getSynopsis() ?>">
    <label for="release_date">Date de sortie</label>
    <input type="date" id="release_date" name="release_date" placeholder="Date de sortie..."
           value="<?= $film->getReleaseDate() ?>">
    <label for="trailer">Lien du trailer</label>
    <input type="text" id="trailer" name="trailer" placeholder="Lien du trailer..." value="<?= $film->getTrailer() ?>">
    <label for="cover">Cover image</label>
    <input type="file" id="cover" name="cover" value="<?= $film->getCover() ?>">
    <img src="/<?= $film->getCover() ?>" alt="cover">
    <input type="hidden" name="oldCover" value="<?= $film->getCover() ?>">
    <label for="cover">Banner image</label>
    <input type="file" id="banner" name="banner" value="<?= $film->getBanner() ?>">
    <img src="/<?= $film->getBanner() ?>" alt="cover">
    <input type="hidden" name="oldBanner" value="<?= $film->getBanner() ?>">
    <label for="gallery">Gallery images</label>
    <div class="gallery-container">
        <input type="file" id="gallery" name="gallery[]" multiple><br/>
        <?php foreach ($allGallery as $image) : ?>
            <div class="gallery-line" data-id="<?= $image->getId() ?>">
                <img src="/<?= $image->getUrl() ?>" alt="gallery" width="150" height="150">
                <button type="button" class="delete-gallery-image" data-id="<?= $image->getId() ?>" data-idFilm="<?= $film->getId() ?>">X</button>
            </div>
        <?php endforeach; ?>
        <input type="hidden" id="removeImages" name="removeImages" value="">
    </div>
    <label for="actors">Acteurs :</label><br>
    <div class="actors-container">
        <?php for ($i = 0; $i < count($allActorsForFilm); $i++) { ?>
            <div class="actors-line">
                <select name="actor<?= $i + 1 ?>" id="actor<?= $i + 1 ?>">
                    <?php foreach ($allActors as $key => $actor) : ?>
                        <option value="<?= $actor->getId() ?>"

                            <?php if ($actor->getId() == $allActorsForFilm[$i]->getId()) { ?>
                                selected
                            <?php } ?>

                        ><?= $actor->getName() ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" id="actor<?= $i + 1 ?>character" name="actor<?= $i + 1 ?>character"
                       placeholder="Personnage joué..." value="<?= $allActorsForFilm[$i]->getPlayedCharacter() ?>">
            </div>

        <?php } ?>
    </div>
    <input type="hidden" id="nbActors" name="nbActors" value="<?= count($allActorsForFilm) ?>">
    <input type="submit" value="Mettre à jour" class="generic-cta">
</form>

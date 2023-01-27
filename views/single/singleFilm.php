<section class="banner">
    <div class="container">
        <div class="banner--content">
            <h1 class="title"><?= $film->getName() ?></h1>
            <img class="banner--image" src="/<?= $film->getBanner() ?>" alt="<?= $film->getBanner() ?>">
        </div>
    </div>
</section>

<section class="resume">
    <div class="container">
        <div class="resume--content">
            <h2 class="subtitle">Résumé</h2>
            <p class="resume--text"><?= $film->getResume() ?></p>
        </div>
    </div>
</section>

<section class="trailer">
    <div class="container">
        <div class="trailer--content">
            <h2 class="subtitle--variant">Bande annnonce</h2>
            <iframe class="trailer--iframe" src="<?= $film->getTrailer() ?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>
</section>

<section class="actor">
    <div class="container">
        <div class="actor--content">
            <h2 class="subtitle">Acteurs</h2>
            <div class="actor--list">
                <?php foreach ($film->getActors() as $actor) { ?>
                    <div class="actor--item">
                        <img class="actor--image" src="<?= $actor->getPicture() ?>" alt="<?= $actor->getName() ?>">
                        <p class="actor--name"><?= $actor->getName() ?></p>
                        <p class="actor--played"><?= $actor->getPlayedCharacter() ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="galery">
    <div class="container">
        <div class="galery--content">
            <h2 class="subtitle">Galerie photo</h2>
            <div class="galery--list">
                <?php foreach ($film->getGallery() as $gallery) {?>
                    <div class="galery--item">
                        <img src="/<?= $gallery->getUrl() ?>" alt="<?= $gallery->getName() ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

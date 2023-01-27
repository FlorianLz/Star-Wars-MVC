<section class="banner default">
    <div class="container">
        <div class="banner--content">
            <h1 class="title">Les acteurs</h1>
            <img class="banner--image" src="/public/images/bannerDefault.png" alt="">
        </div>
    </div>
</section>

<section class="actor">
    <div class="container">
        <div class="actor--content">
            <div class="actor--content__list">
                <?php foreach ($actors as $actor) : ?>
                    <div class="actor--content__list__item">
                        <img src="<?= $actor->getPicture() ?>" alt="<?= $actor->getName() ?>">
                        <h2 class="actor--content__list__item__name"><?= $actor->getName() ?></h2>
                        <h3 class="actor--content__list__item__character"><?= $actor->getPlayedCharacter() ?></h3>
                        <ul class="actor--content__list__item__films">
                            <?php foreach ($actor->getFilmsPresence() as $film) : ?>
                                <li><?= $film ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if ($admin) : ?>
                            <div class="actor--content__list__item__delete">
                                <form action="/admin/actors/delete/<?= $actor->getId() ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $actor->getId() ?>">
                                    <input type="submit" value="Supprimer">
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

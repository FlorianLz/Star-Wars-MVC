<?php if(!$admin){ ?>
    <section class="banner default">
        <div class="container">
            <div class="banner--content">
                <h1 class="title">Les acteurs</h1>
                <img class="banner--image" src="/public/images/bannerDefault.png" alt="banniere">
            </div>
        </div>
    </section>
<?php } ?>

<section class="actor">
    <div class="container">
        <div class="actor--content">
            <?php if($admin){ ?>
            <a href="/admin/actors/add">Ajouter un acteur</a>
            <?php } ?>
            <div class="actor--content__list">
                <?php foreach ($actors as $actor) : ?>
                    <div class="actor--content__list__item">
                        <div class="actor--content__left">
                            <img src="/<?= $actor->getPicture() ?>" alt="<?= $actor->getName() ?>">
                        </div>
                        <div class="actor--content__right">
                            <h2 class="actor--content__list__item__name"><?= $actor->getName() ?></h2>
                            <ul class="actor--content__list__item__films">
                                <?php if(!is_null($actor->getFilmsPresence())){ ?>
                                    <?php foreach ($actor->getFilmsPresence() as $index=>$film) : ?>
                                        <li><?= $film ?> - <?= $actor->getPlayedCharacter()[$index] ?></li>
                                    <?php endforeach; ?>
                                <?php }else{
                                    echo "<li>Cet acteur n'a pas encore joué dans un film</li>";
                                } ?>
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
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

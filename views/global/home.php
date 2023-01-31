<section class="hero">
    <div class="container">
        <img class="hero--image" src="/public/images/homepage.png">
        <div class="hero--content">
            <h1 class="hero--title">Prochain film <br><b>Star Wars x</b></h1>
            <div class="hero--time">
                <p id="days"></p>
                <p id="hours"></p>
                <p id="minutes"></p>
            </div>
        </div>
    </div>
</section>

<section class="resume">
    <div class="container">
        <div class="resume--content">
            <h2 class="subtitle">La saga Star wars</h2>
            <p class="resume--text">
                La saga Star Wars est l'une des plus célèbres et influentes franchises de science-fiction de tous les temps. Créée par George Lucas en 1977, elle a captivé des générations de fans avec ses histoires d'aventure, de lumières et d'obscurité dans une galaxie lointaine, très lointaine. La saga comprend neuf films principaux, des séries animées, des romans, des jeux vidéo et bien plus encore.
                Le premier film, "Star Wars : Episode IV - Un nouvel espoir", a introduit au monde les personnages emblématiques tels que Luke Skywalker, Princess Leia, Han Solo, Chewbacca, C-3PO et R2-D2. Ensemble, ils se battent contre l'Empire galactique et son armée de stormtroopers, menés par le mystérieux Dark Vador. Au fil des années, la saga a exploré la lutte entre la Force et la tentation du côté obscur, ainsi que les sacrifices nécessaires pour maintenir la paix dans la galaxie.
                La saga a également présenté de nouveaux personnages fascinants, tels que Rey, Finn, Poe Dameron et Kylo Ren, qui continuent à élargir l'univers de Star Wars. De plus, la saga a été renouvelée avec une trilogie de films, "Star Wars: Le Réveil de la Force", qui a introduit de nouveaux mondes, ennemis et alliés tout en explorant les thèmes familiers de la série originale.
                Ce site met en avant les informations relatives aux différents films qui ont pu sortir, pour le plus grand bonheur de tous les fans !
            </p>
        </div>
    </div>
</section>

<section class="actor">
    <div class="container">
        <div class="actor--content">
            <h2 class="subtitle">Acteurs</h2>
            <div class="actor--list">
                <?php foreach ($actors as $actor) : ?>
                    <div class="actor--item">
                        <img class="actor--image" src="<?= $actor->getPicture() ?>" alt="<?= $actor->getName() ?>">
                        <p class="actor--name"><?= $actor->getName() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="actor--viewmore">
                <a class="generic-cta" href="/actors">Voir tous les acteurs</a>
            </div>
        </div>
    </div>
</section>

<section class="resume">
    <div class="container">
        <div class="resume--content">
            <h2 class="subtitle">Le reveil de la force</h2>
            <p class="resume--text">Des références à la saga sont cachées sur le site. Arriverez-vous à les retrouver ? </p>
        </div>
    </div>
</section>

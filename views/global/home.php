<?php $repliques = [
    ["texte" => '"Au secours Obi-Wan Kenobi, vous êtes mon seul espoir."'],
    ["texte" => '"La force sera avec toi, toujours."'],
    ["texte" => '"Fais-le ou ne le fais pas. Il n\'y a pas d\'essai."'],
    ["texte" => '"Je suis ton père."'],
    ["texte" => '"Je ne viendrai jamais du côté obscur. Vous avez échoué."'],
    ["texte" => '"La peur est le chemin vers le côté obscur : la peur mène à la colère, la colère mène à la haine, la haine mène à la souffrance."'],
    ["texte" => '"Le jour où nous cessons de croire que la démocratie fonctionne est le jour où nous perdons."'],
    ["texte" => '"Je t\'aime." "Je sais."'],
    ["texte" => "Un Jedi n'utilise pas la violence, il la maîtrise."],
    ["texte" => '"Vous êtes venus dans cette casserole ? Vous êtes plus braves que je ne le pensais."'],
    ["texte" => '"La puissance ne fait pas tout."'],
    ["texte" => '"Que la force soit avec toi."'],
    ["texte" => '"Fais le ou ne le fais pas. Il n\'y a pas d\'essai."'],
    ["texte" => '"Maintenant jeune Skywalker, tu vas mourir."'],
    ["texte" => '"Il y en a toujours un pour manger l\'autre"'],
    ["texte" => '"Aucune limite à mon pouvoir !"'],
    ["texte" => '"Nous étions comme des frères. Je t\'aimais Anakin !"'],
    ["texte" => '"Chewie, on est à la maison."'],
    ["texte" => '"L\'Empire est fini."'],
    ["texte" => '"Nous sommes les derniers espoirs de la galaxie."']
];
?>
<div class="loader">
    <p><?= $repliques[array_rand($repliques)]["texte"] ?></p>
</div>
<section class="hero">
    <div class="container">
        <img class="hero--image" src="/public/images/homepage.png">
        <div class="hero--content">
            <h1 class="hero--title">Prochain film <br><b>Star Wars x</b></h1>
            <div class="hero--time">
                <p id="years"></p>
                <p id="months"></p>
                <p id="days"></p>
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
            <h2 class="subtitle">Des acteurs connus</h2>
            <div class="actor--list">
                <?php foreach ($actors as $actor) : ?>
                    <div class="actor--item">
                        <img class="actor--image" src="<?= $actor->getPicture() ?>" alt="<?= $actor->getName() ?>">
                        <p class="actor--name"><?= $actor->getName() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="actor--viewmore">
                <a class="generic-cta" href="/actors">voir tous les acteurs</a>
            </div>
        </div>
    </div>
</section>

<section class="resume">
    <div class="container">
        <div class="resume--content">
            <h2 class="subtitle">Le réveil de la force</h2>
            <p class="resume--text">Une animation spéciale à la saga est cachée sur le site. Arriverez-vous à la retrouver ? </p>
        </div>
    </div>
</section>

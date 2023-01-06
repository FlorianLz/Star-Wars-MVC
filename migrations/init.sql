--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users`
(
    `id` int
(
    11
) NOT NULL,
    `nom` varchar
(
    30
) NOT NULL,
    `prenom` varchar
(
    30
) NOT NULL,
    `email` varchar
(
    255
) NOT NULL,
    `password` varchar
(
    255
) NOT NULL,
    `timestamp` timestamp NOT NULL DEFAULT current_timestamp
(
)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `todos`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `todos`
--
ALTER TABLE `users`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
    ADD UNIQUE (`email`);

CREATE TABLE IF NOT EXISTS `films`
(
    `id` INT
(
    11
) NOT NULL ,
    `name` VARCHAR
(
    255
) NOT NULL ,
    `cover` VARCHAR
(
    255
) NOT NULL ,
    `synopsis` TEXT NOT NULL ,
    `resume` TEXT NOT NULL ,
    `release_date` DATE NOT NULL ,
    `banner` VARCHAR
(
    255
) NOT NULL ,
    `trailer` VARCHAR
(
    255
) NOT NULL ,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `updated_at` DATETIME NOT NULL
    ) ENGINE = InnoDB;

ALTER TABLE `films`
    ADD PRIMARY KEY (`id`);

CREATE TABLE IF NOT EXISTS `actors`
(
    `id` INT
(
    11
) NOT NULL,
    `name` VARCHAR
(
    255
) NOT NULL,
    `picture` VARCHAR
(
    255
) NOT NULL,
    `played_character` VARCHAR
(
    255
) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL
    ) ENGINE = InnoDB;

ALTER TABLE `actors`
    ADD PRIMARY KEY (`id`);


CREATE TABLE `wlfy3366_starwarsmvc`.`films_actors`
(
    `id_film`    INT(11) NOT NULL,
    `id_actor`   INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL
) ENGINE = InnoDB;
ALTER TABLE `films_actors`
    ADD CONSTRAINT `FK_FILM` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `films_actors`
    ADD CONSTRAINT `FK_ACTOR` FOREIGN KEY (`id_actor`) REFERENCES `actors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `wlfy3366_starwarsmvc`.`gallery`
(
    `id`         INT(11) NOT NULL AUTO_INCREMENT,
    `url`        VARCHAR(255) NOT NULL,
    `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `wlfy3366_starwarsmvc`.`comments`
(
    `id`         INT(11) NOT NULL,
    `id_film`    INT(11) NOT NULL,
    `id_user`    INT(11) NOT NULL,
    `comment`    TEXT     NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL
) ENGINE = InnoDB;
ALTER TABLE `comments`
    ADD CONSTRAINT `FK_FILMCOMMENT` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `comments`
    ADD CONSTRAINT `FK_USERCOMMENT` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

COMMIT;


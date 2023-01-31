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
    `name`       VARCHAR(255) NOT NULL,
    `url`        VARCHAR(255) NOT NULL,
    `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `wlfy3366_starwarsmvc`.`films_gallery`
(
    `id_film`    INT(11) NOT NULL,
    `id_gallery`   INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL
) ENGINE = InnoDB;
ALTER TABLE `films_gallery`
    ADD CONSTRAINT `FK_FILMGALLERY` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `films_gallery`
    ADD CONSTRAINT `FK_GALLERYFILM` FOREIGN KEY (`id_gallery`) REFERENCES `gallery` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `wlfy3366_starwarsmvc`.`comments`
(
    `id`         INT(11) NOT NULL,
    `comment`    TEXT     NOT NULL,
    `user_name`     VARCHAR(255) NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL,
        PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `wlfy3366_starwarsmvc`.`films_comments`
(
    `id_film`    INT(11) NOT NULL,
    `id_comment`   INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL
) ENGINE = InnoDB;
ALTER TABLE `films_comments`
    ADD CONSTRAINT `FK_FILMCOMMENTS` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `films_comments`
    ADD CONSTRAINT `FK_COMMENTSFILM` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

COMMIT;


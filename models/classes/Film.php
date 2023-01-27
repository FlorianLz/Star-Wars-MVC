<?php

namespace models\classes;

use models\FilmModel;

class Film
{
    private int $id;
    private string $name;
    private string $cover;
    private string $synopsis;
    private string $resume;
    private string $trailer;
    private string $release_date;
    private string $banner;
    private FilmModel $filmModel;
    private string $creationDate;
    private string $updateDate;
    private array $actors;
    private array $gallery;
    private array $comments;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
    }

    /**
     * Retourne la liste des films
     * @return Film[]
     */
    public function getAll(): array
    {
        return $this->filmModel->getAll();
    }

    public function toString(): string
    {
        return join(",", array_filter([$this->id, $this->name, $this->cover, $this->synopsis, $this->resume, $this->trailer, $this->releaseDate, $this->banner, $this->creationDate, $this->updateDate, $this->actors]));
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return string
     */
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * @param string $resume
     */
    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return string
     */
    public function getTrailer(): string
    {
        return $this->trailer;
    }

    /**
     * @param string $trailer
     */
    public function setTrailer(string $trailer): void
    {
        $this->trailer = $trailer;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate(string $releaseDate): void
    {
        $this->release_date = $releaseDate;
    }

    /**
     * @return string
     */
    public function getBanner(): string
    {
        return $this->banner;
    }

    /**
     * @param string $banner
     */
    public function setBanner(string $banner): void
    {
        $this->banner = $banner;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * @param string $creationDate
     */

    public function setCreationDate(string $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */

    public function getUpdateDate(): string
    {
        return $this->updateDate;
    }

    /**
     * @param string $updateDate
     */

    public function setUpdateDate(string $updateDate): void
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return Actor[]
     */
    public function getActors(): array
    {
        return $this->actors;
    }

    /**
     * @param Actor[] $actors
     */
    public function setActors(array $actors): void
    {
        $this->actors = $actors;
    }

    /**
     * @return Gallery[]
     */
    public function getGallery(): array
    {
        return $this->gallery;
    }

    /**
     * @param Gallery[] $gallery
     */
    public function setGallery(array $gallery): void
    {
        $this->gallery = $gallery;
    }

    public function addGallery($gallerie): void
    {
        $this->filmModel->addGallerySingle($this->id, $gallerie);
    }

    public function addActor($actor): void
    {
        $this->filmModel->addActor($this->id, $actor);
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     */
    public function setComments(array $comments): void
    {
        $this->comments = $comments;
    }
}

<?php

namespace models\classes;

use models\CommentModel;

class Comment
{
    private int $id;
    private string $comment;
    private int $filmId;
    private int $author;
    private User $authorInfos;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return User
     */
    public function getAuthorInfos(): User
    {
        return $this->authorInfos;
    }

    /**
     * @param User $authorInfos
     */
    public function setAuthorInfos(User $authorInfos): void
    {
        $this->authorInfos = $authorInfos;
    }
    private string $creationDate;
    private string $updateDate;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function setAuthor(mixed $id): void
    {
     $this->author = $id;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return int
     */
    public function getFilmId(): int
    {
        return $this->filmId;
    }

    /**
     * @param int $filmId
     */
    public function setFilmId(int $filmId): void
    {
        $this->filmId = $filmId;
    }
}

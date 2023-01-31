<?php

namespace models\classes;

class Actor
{
    private int $id;
    private string $name;
    private string $picture;
    private string | array | null $played_character;
    private string $creationDate;
    private string $updateDate;
    private string | array | null  $films_presence;

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
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return string | null
     */
    public function getPlayedCharacter(): string | null | array
    {
        return $this->played_character;
    }

    /**
     * @param $playedCharacter
     */
    public function setPlayedCharacter(string | array | null $playedCharacter): void
    {
        if(gettype($playedCharacter) == null) {
            $this->played_character = [];
        } else {
            $this->played_character = $playedCharacter;
        }
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
     * @return string | array| null
     */
    public function getFilmsPresence(): string | array| null
    {
        return $this->films_presence;
    }

    /**
     * @param string | array | null $films_presence
     */
    public function setFilmsPresence(string | array | null $films_presence): void
    {
        if(gettype($films_presence) == null) {
            $this->films_presence = [];
        } else {
            $this->films_presence = $films_presence;
        }
    }
}

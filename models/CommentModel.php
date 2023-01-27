<?php

namespace models;
use models\base\SQL;
use models\classes\User;

class CommentModel extends SQL
{

    public function __construct()
    {
        parent::__construct('comments', 'id');
    }

    public function getCommentsByFilmId(int $id): array
    {
        $stmt = self::getPdo()->prepare("SELECT * FROM comments JOIN films_comments ON films_comments.id_comment = comments.id WHERE id_film = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, \models\classes\Comment::class);
    }

    public function addComment($comment){
        try {
            $stmt = self::getPdo()->prepare("INSERT INTO comments (comment,user_id) VALUES (?,?)");
            $stmt->execute([$comment->getComment(), $comment->getAuthor()]);

            //insert into films_comments
            $stmt = self::getPdo()->prepare("INSERT INTO films_comments (id_film, id_comment) VALUES (?,?)");
            $stmt->execute([$comment->getFilmId(), self::getPdo()->lastInsertId()]);

            return [
                'success' => true,
                'message' => 'Commentaire ajouté',
                'comment' => $comment->getComment(),
                'author' => $comment->getAuthor(),
                'filmId' => $comment->getFilmId()
            ];

        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getUserInfosByCommentId($getId)
    {
        $stmt = self::getPdo()->prepare("SELECT * FROM users JOIN comments ON comments.user_id = users.id WHERE comments.id = ?");
        $stmt->execute([$getId]);
        $stmt->setFetchMode(self::getPdo()::FETCH_CLASS, User::class);
        return $stmt->fetch();
    }
}

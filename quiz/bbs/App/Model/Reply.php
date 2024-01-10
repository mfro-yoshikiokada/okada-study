<?php


namespace bbs\App\Model;

use PDO;

class Reply extends Model
{
    protected PDO $pdo;

    function getReplie(int $comment_id) {
         $stmt = $this->pdo->prepare("SELECT * FROM replies WHERE comment_id  = :id");

         $stmt->bindParam(':id', $comment_id,  PDO::PARAM_STR);

         $res = $stmt->execute();

         if ($res) {
             $data = $stmt->fetch(PDO::FETCH_ASSOC);
             return $data;
         } else {
             return null;
         }
     }
    public function getReplies(int $comment_id): array
    {
        $sql = 'SELECT nickname, reply_text, created_at FROM users JOIN replies ON users.id = replies.user_id WHERE comment_id = :id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $comment_id, PDO::PARAM_INT);
        $stmt->execute();
        $aryItem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $aryItem;
    }


    function getComment(int $comment_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE id = :id");

        $stmt->bindParam(':id', $comment_id,  PDO::PARAM_STR);

        $res = $stmt->execute();

        if ($res) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            return null;
        }
    }
}

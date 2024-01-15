<?php

namespace bbs\App\Model;

use PDO;

class Comment extends Model
{
    public function getComments(): array
    {
        $sql = '
SELECT nickname, comment_text , comments.id ,created_at 
FROM users JOIN comments ON users.id = comments.user_id;
';
        $stmt = $this->pdo->query($sql);
        $aryItem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $aryItem;
    }
    public function numberOfReplies(int  $comment_id) :string
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM replies WHERE comment_id = ?;");
        $stmt->execute(array($comment_id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return  $result["COUNT(*)"];
    }


    public function createComments(Array $body, int $id, string $time): void
    {
        $sql = 'INSERT INTO comments (user_id, comment_text, created_at) VALUES (?, ?, ?);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $body["body"], $time]);
    }
}

<?php

namespace bbs\App\Model;

use PDO;

class Comment extends Model
{
    public function getComments(): array
    {
        $sql = 'SELECT nickname, comment_text ,created_at FROM users JOIN comments ON users.id = comments.user_id;
            ';
        $stmt = $this->pdo->query($sql);
        $aryItem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $aryItem;
    }

    public function createComments(Array $body, int $id, string $time): void
    {
        $sql = 'INSERT INTO comments (user_id, comment_text, created_at) VALUES (?, ?, ?);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $body["body"], $time]);
    }
}

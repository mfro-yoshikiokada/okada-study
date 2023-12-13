<?php

namespace bbs\App\Model;

use PDO;

class Comment extends Model
{
    public function getComments(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM comments");

        $aryItem = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return  $aryItem;
    }

    public function createComments(Array $body): void
    {
        $sql = 'INSERT INTO comments (user_id, comment_text) VALUES (?, ?);';
        $id = 1;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $body["body"]]);
    }
}

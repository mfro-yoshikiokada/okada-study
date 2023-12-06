<?php

namespace bbs\App\Model;

use PDO;

class Comment extends Model
{
    public function getComments(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM comments");

        $aryItem = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        var_dump($aryItem);
        return  $aryItem;
    }

    public function createComments($body): void
    {
        $sql = 'INSERT INTO comments (user_id, comment_text) VALUES (?, ?);';
        $id = 1;
        $stmt = $this->pdo->prepare($sql);
        $flag = $stmt->execute([$id, $body]);

    }

}

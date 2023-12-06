<?php

namespace bbs\App\Model;

class Signup extends Model
{
    public function getComments(): array
    {
       $this->pdo->prepare('コメント取得のSQL');

        // コメントを取得する処理

        // コメントを返す
        return ['コメント1', 'コメント2'];
    }

    public function createAccount($body): void
    {
        $sql = 'insert into users values (?,?, 21)';
        $stmt = $dbh->prepare($sql);

        $flag = $stmt->execute(array($id, $value));
    }
}

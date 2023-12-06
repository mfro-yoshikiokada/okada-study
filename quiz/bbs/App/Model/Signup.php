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
        $sql = 'insert into users values (?,?,?)';
        $stmt = $this->pdo->prepare($sql);

        $flag = $stmt->execute($body);
    }
}

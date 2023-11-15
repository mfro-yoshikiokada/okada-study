<?php

namespace bbs\App\Model;

class Comment extends Model
{
    public function getComments(): array
    {
//        $this->pdo->prepare('コメント取得のSQL');

        // コメントを取得する処理

        // コメントを返す
        return ['コメント1', 'コメント2'];
    }

    public function createComments(): void
    {
        // DBにコメントを保存
    }
}

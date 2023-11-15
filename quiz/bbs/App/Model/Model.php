<?php

namespace bbs\App\Model;

abstract class Model
{
    protected \PDO $pdo;

    public function __construct()
    {
        // TODO DB接続情報を入力してください
        $dsn = '';
        $user = '';
        $password = '';
//        $this->pdo = new \PDO($dsn, $user, $password);
    }
}

<?php

namespace bbs\App\Model;

use PDO;

abstract class Model
{
    protected PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=test;charset=UTF8';
        $user = 'test';
        $password = 'test';

        try {
            $this->pdo = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            print('Error: ' . $e->getMessage());
            die();
        }
    }
}

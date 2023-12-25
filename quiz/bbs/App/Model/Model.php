<?php

namespace bbs\App\Model;

use PDO;

abstract class Model
{
    protected PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=vmc;charset=UTF8';
        $user = 'root';
        $password = 'root';

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print('Connection failed: ' . $e->getMessage());
            die();
        }
    }
}

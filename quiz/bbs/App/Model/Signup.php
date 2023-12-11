<?php

namespace bbs\App\Model;

class Signup extends Model
{

    public function createAccount($body)
    {
        $sql = 'insert into users values (?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        $flag = $stmt->execute($body);
    }
}

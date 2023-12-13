<?php

namespace bbs\App\Model;

use PDO;

class Signup extends Model
{
    public function createAccount($body)
    {
        $sql = 'insert into users (nickname, email, password) values (?, ?, ?)';
        $nickname = $body["nickname"];
        $mailAddress = $body["mailAddress"];
        $password = $body["password"];
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nickname, $mailAddress, $password]);
    }

    public function searchUserId($mail)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
}

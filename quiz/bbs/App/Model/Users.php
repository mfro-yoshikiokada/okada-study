<?php

namespace bbs\App\Model;

use PDO;

class Users extends Model
{
    protected PDO $pdo;

    public function searchEmail(string $mail) :array|null
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");

        $stmt->bindParam(':email', $mail);

        $res = $stmt->execute();
        if ($res) {
            $data = $stmt->fetch();
            return $data;
        } else {
            return null;
        }
    }

    public function createAccount(array $body): void
    {
        $sql = 'insert into users (nickname, email, password) values (?, ?, ?)';
        $nickname = $body["nickname"];
        $mailAddress = $body["mailAddress"];
        $password = $body["password"];
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nickname, $mailAddress, $password]);
    }

    public function searchUserId(string $mail) : string
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
}

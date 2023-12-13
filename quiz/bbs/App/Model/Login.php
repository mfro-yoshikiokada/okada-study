<?php

namespace bbs\App\Model;

use PDO;

class Login extends Model
{
    protected PDO $pdo;

    public function email($mail)
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
}

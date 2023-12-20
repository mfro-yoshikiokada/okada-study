<?php

namespace bbs\App\Controller;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Users;

class LoginController extends BaseController
{
    public function login(Users $usersModel, Array $data): void
    {
        $email=$usersModel->searchEmail($data["mailAddress"]);
        if ($email!==null && $data["password"]==$email["password"]) {
            $_SESSION['id'] = $email["id"];
            $this->redirect('/comment/');
        } else {
            $this->redirect('/users/login.php');
        }
    }
    public function show()
    {
        $this->view(__DIR__ . '/../../View/login.php');
    }
}

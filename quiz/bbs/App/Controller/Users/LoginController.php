<?php

namespace bbs\App\Controller;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Login;
use bbs\App\Model\Signup;

class LoginController extends BaseController
{
    public function login ($loginModel ,$data) {
        $email=$loginModel->email($data["mailAddress"]);
        if($email!==null && $data["password"]==$email["password"]) {
            session_start();
            $_SESSION['id'] = $email["id"];
            header('Location:/quiz/bbs/public/comment/');
        } else {
            header('Location:quiz/bbs/public/users/login.php');
        }
    }
    public function show()
    {
        $this->view(__DIR__ . '/../../View/login.php');
    }

}
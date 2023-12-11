<?php


namespace bbs\App\Controller\Signup;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Signup;

class SignupController extends BaseController
{
    public function create(signup $signupModel, $postData)
    {
        $signupModel->createAccount($postData);
        session_start();
        $_SESSION['id'] = 1;
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/quiz/bbs/public/comment/index.php');
        exit;
    }
    public function show(signup $signupModel)
    {

        $this->view(__DIR__ . '/../../View/signup.php');

    }
}
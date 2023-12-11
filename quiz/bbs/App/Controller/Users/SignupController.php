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
        $Id = $signupModel->searchUserId($postData["mailAddress"]);
        unset($_SESSION);
        $_SESSION['id'] = $Id;
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/quiz/bbs/public/comment/index.php?='.$Id);

    }
    public function show(signup $signupModel)
    {
        $this->view(__DIR__ . '/../../View/signup.php');

    }
}
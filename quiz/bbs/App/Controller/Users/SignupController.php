<?php


namespace bbs\App\Controller\Signup;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Signup;

class SignupController extends BaseController
{
    public function create(signup $signupModel, Array $postData): void
    {
        $signupModel->createAccount($postData);
        session_start();
        $Id = $signupModel->searchUserId($postData["mailAddress"]);
        $_SESSION['id'] = $Id;
        header('Location:/quiz/bbs/public/comment/');
    }

    public function show(signup $signupModel): void
    {
        $this->view(__DIR__ . '/../../View/signup.php');
    }
}

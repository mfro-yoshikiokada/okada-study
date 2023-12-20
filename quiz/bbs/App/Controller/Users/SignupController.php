<?php


namespace bbs\App\Controller\Signup;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Users;

class SignupController extends BaseController
{
    public function create(Users $signupModel, array $postData): void
    {
        $signupModel->createAccount($postData);
        $id = $signupModel->searchUserId($postData["mailAddress"]);
        $_SESSION['id'] = $id;
        $this->redirect('/comment/');
    }

    public function show(Users $signupModel): void
    {
        $this->view(__DIR__ . '/../../View/signup.html');
    }
}

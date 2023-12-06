<?php


namespace bbs\App\Controller\Signup;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Signup;

class SignupController extends BaseController
{
    public function create(signup $signupModel): void
    {

        $body = $_POST['body'];
        var_dump($body);

    }
    public function show(signup $signupModel): void
    {
        $comments =  $signupModel->getComments();

        $this->view(__DIR__ . '/../../View/threads.php', [
            'comments' => $comments
        ]);


    }
}
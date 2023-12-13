<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class CreateController extends BaseController
{
    public function create(Comment $commentModel, Array $postData): void
    {
        session_start();
        $id = (int)$_SESSION["id"];
        $commentModel->createComments($postData, $id);
        header('Location:/quiz/bbs/public/comment/');
        exit;
    }
}

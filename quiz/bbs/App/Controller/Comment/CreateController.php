<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class CreateController extends BaseController
{
    public function create(Comment $commentModel,$postData): void
    {
        $commentModel->createComments($postData);
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/quiz/bbs/public/comment/index.php');
        exit;
    }
}

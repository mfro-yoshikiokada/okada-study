<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class CreateController extends BaseController
{
    public function create(Comment $commentModel, array $postData): void
    {
        $id = (int)$_SESSION["id"];
        $commentModel->createComments($postData, $id);
        $this->redirect('/comment/');
    }
}

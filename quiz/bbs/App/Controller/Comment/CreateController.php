<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class CreateController extends BaseController
{
    public function create(Comment $commentModel, array $postData): void
    {
        $formated_DATETIME = date('Y-m-d H:i:s');
        $id = (int)$_SESSION["id"];
        $body = $postData["body"];
        $commentModel->createComments(['body' => $body], $id, $formated_DATETIME);
        $this->redirect('/comment/');
    }
}

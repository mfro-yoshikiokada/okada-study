<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class CreateController extends BaseController
{
    public function create(Comment $commentModel): void
    {
        // ここでリクエストから送信されたデータを取得
        $body = $_POST['body'];
        $commentModel->createComments($body);

        $this->redirect('/comment/index.php');
    }
}

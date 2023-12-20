<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class ShowController extends BaseController
{
    public function show(Comment $commentModel): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('/users/login.html');
        }
        $comments = $commentModel->getComments();

        $this->view(__DIR__ . '/../../View/threads.php', [
            'comments' => $comments
        ]);
    }
}

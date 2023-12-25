<?php

namespace bbs\App\Controller\Reply;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Reply;

class ShowController extends BaseController
{
    public function show(Reply $replyModel): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('/users/login.php');
        }
        $comment_id = $_GET['comment'];
        $comment = $replyModel->getComment($comment_id);
        //$replies = $replyModel->getReplies();

        $this->view(__DIR__ . '/../../View/reply.show.php', [
            'comment' => $comment,
            //'replies' => $replies
        ]);
    }
}

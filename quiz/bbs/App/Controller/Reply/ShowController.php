<?php

namespace bbs\App\Controller\Reply;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Reply;
use bbs\App\Model\Comment;

class ShowController extends BaseController
{
    public function show(Reply $replyModel, Comment $commentModel): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('/users/login.php');
        }
        $comment_id = $_GET['comment'];
        $comment = $commentModel->getComment($comment_id);
        $replies = $replyModel->getReplies($comment_id);

        $this->view(__DIR__ . '/../../View/reply.show.php', [
            'comment' => $comment,
            'replies' => $replies
        ]);
    }
}

<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;
use bbs\App\Model\Reply;

class ShowController extends BaseController
{
    public function show(Comment $commentModel, Reply $replyModel): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('/users/login.php');
        }
        $comments = $commentModel->getComments();
        $allReply = $replyModel->getAllIdReplies();

        $allReplyArray =[];
        foreach ($allReply as $pref) {
            $allReplyArray[] = $pref["comment_id"];
        }

        $numberOfReplies = [];
        $limit = 0;

        while ($limit < count($comments)+5) {
            $array_keys = array_keys($allReplyArray, $limit);
            $numberOfReplies[$limit] = count($array_keys);
            $limit++;
        }
        $this->view(__DIR__ . '/../../View/threads.php', [
            'comments' => $comments,
            'numberOfReplies' =>  $numberOfReplies
        ]);
    }
}

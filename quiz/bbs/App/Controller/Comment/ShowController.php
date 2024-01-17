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

        $allReplyArray = [];
        foreach ($allReply as $pref) {
            $allReplyArray[] =  intval($pref["comment_id"]);
        }
        $commentsId = [];
        foreach ($comments as $pref) {
            $commentsId[] =  intval($pref["id"]);
        }
        $numberOfReplies = [];
        foreach ($comments as $key => $comment) {
            $array_keys = array_keys($allReplyArray, $key);
            $numberOfReplies[$key] = count($array_keys);
        }
        var_dump(count($comments)); // int(6)
        var_dump(count($numberOfReplies)); //int(11)
        $this->view(__DIR__ . '/../../View/threads.php', [
            'comments' => $comments,
            'numberOfReplies' =>  $numberOfReplies
        ]);
    }
}

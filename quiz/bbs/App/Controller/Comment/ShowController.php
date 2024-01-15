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
        $AllReply = $replyModel->getAllIdReplies();

        $AllReplyArray =[];
        foreach ($AllReply as $pref){
            $AllReplyArray[] = $pref["comment_id"];
        }

        $numberOfReplies = [];
        for ($count = 1; $count < count($comments)+5; $count++) {
            $array_keys = array_keys($AllReplyArray, $count);
            $numberOfReplies[$count] = count($array_keys);
        }
        $this->view(__DIR__ . '/../../View/threads.php', [
            'comments' => $comments,
            'numberOfReplies' =>  $numberOfReplies
        ]);
    }
}

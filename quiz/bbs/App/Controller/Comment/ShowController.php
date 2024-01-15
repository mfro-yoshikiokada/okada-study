<?php

namespace bbs\App\Controller\Comment;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class ShowController extends BaseController
{
    public function show(Comment $commentModel): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('/users/login.php');
        }
        $comments = $commentModel->getComments();
        $numberOfReplies = [];
        for ($count = 1; $count < count($comments)+1; $count++){
            array_push($numberOfReplies, $commentModel->numberOfReplies($count+4));
        }
        var_dump($numberOfReplies);
        $this->view(__DIR__ . '/../../View/threads.php', [
            'comments' => $comments,
            'numberOfReplies' =>  $numberOfReplies
        ]);
    }
}

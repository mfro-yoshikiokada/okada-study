<?php


namespace bbs\App\Controller\Comment;


use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;
use bbs\App\Model\Reply;

class EditController extends BaseController
{
    public function show(Comment $commentModel, Reply $replyModel): void {
        $comment_id = $_GET['id'];
        $comment = $commentModel->getComment($comment_id);
        $this->view(__DIR__ . '/../../View/edit.php', [
            'comment' => $comment
        ]);
    }

    public function edit(Comment $commentModel ,array $postData): void {

        $this->confirmLogin($postData["user_id"]);
        $commentModel->editComments($postData["body"], $postData["comment_id"]);
        $this->redirect('/comment/');
    }
}

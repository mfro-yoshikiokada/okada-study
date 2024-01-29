<?php


namespace bbs\App\Controller\Reply;

use bbs\App\Controller\BaseController;
use bbs\App\Model\Reply;

class CreateController extends BaseController
{
    public function create(Reply $replyModel, array $postData): void
    {
        $formated_DATETIME = date('Y-m-d H:i:s');
        $user_id = $_SESSION['id'];
        $comment_id = $postData["comment_id"];
        $reply_text = nl2br(htmlspecialchars($postData["body"], ENT_QUOTES, 'UTF-8'));
        $created_at = $formated_DATETIME;
        $replyModel->createReply($user_id, $comment_id, $reply_text, $created_at);
        $this->redirect('/reply/show.php?comment='.$postData["comment_id"]);
    }
}

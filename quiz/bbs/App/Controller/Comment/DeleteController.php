<?php


namespace bbs\App\Controller\Comment;


use bbs\App\Controller\BaseController;
use bbs\App\Model\Comment;

class DeleteController extends BaseController
{
    public function delete(Comment $commentModel) {
        $id = $_GET['id'];
        $commentModel->deleteComments($id);
        $this->redirect('/comment/');
    }
}

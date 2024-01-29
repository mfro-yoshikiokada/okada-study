<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/DeleteController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';

use bbs\App\Controller\Comment\DeleteController;
use bbs\App\Model\Comment;

$controller = new DeleteController();
$controller->delete(new Comment());

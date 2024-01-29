<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/EditController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';
require_once __DIR__ . '/../../App/Model/Reply.php';

use bbs\App\Controller\Comment\EditController;
use bbs\App\Model\Comment;
use bbs\App\Model\Reply;

$controller = new EditController();
$controller->show(new Comment(), new Reply());

<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/SignupController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';

use bbs\App\Controller\Comment\SignupController;
use bbs\App\Model\Comment;

$controller = new SignupController();
$controller->show(new Comment());

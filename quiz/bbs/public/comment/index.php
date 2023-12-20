<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/ShowController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';

use bbs\App\Controller\Comment\ShowController;
use bbs\App\Model\Comment;

$controller = new ShowController();
$controller->show(new Comment());

<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/EditController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';

use bbs\App\Controller\Comment\EditController;
use bbs\App\Model\Comment;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = $_POST;
}
$controller = new EditController();
$controller->edit(new Comment(), $postData);

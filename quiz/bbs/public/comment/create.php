<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/CreateController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';

use bbs\App\Controller\Comment\CreateController;
use bbs\App\Model\Comment;

header("Cache-Control:no-cache,no-store,must-revalidate,max-age=0");
header("Cache-Control:pre-check=0","post-check=0",false);
header("Pragma:no-cache");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = $_POST;

}


$controller = new CreateController();
$controller->create(new Comment(),$postData);

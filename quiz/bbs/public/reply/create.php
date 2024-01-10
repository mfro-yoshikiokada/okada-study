<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Reply/CreateController.php';
require_once __DIR__ . '/../../App/Model/Reply.php';

use bbs\App\Controller\Reply\CreateController;
use bbs\App\Model\Reply;

$controller = new CreateController();
$controller->create(new Reply(), $_POST);



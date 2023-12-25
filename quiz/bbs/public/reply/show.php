<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Reply/ShowController.php';
require_once __DIR__ . '/../../App/Model/Reply.php';

use bbs\App\Controller\Reply\ShowController;
use bbs\App\Model\Reply;

$controller = new ShowController();
$controller->show(new Reply());

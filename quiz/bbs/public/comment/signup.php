<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/SignupController.php';
require_once __DIR__ . '/../../App/Model/Comment.php';

use bbs\App\Controller\Signup\SignupController;
use bbs\App\Model\Signup;
header("Cache-Control:no-cache,no-store,must-revalidate,max-age=0");
header("Cache-Control:pre-check=0","post-check=0",false);
header("Pragma:no-cache");
$controller = new SignupController();
$controller->show(new Signup());

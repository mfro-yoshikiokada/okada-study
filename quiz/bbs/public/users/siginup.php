<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Users/SignupController.php';
require_once __DIR__ . '/../../App/Model/Users.php';

use bbs\App\Controller\Signup\SignupController;
use bbs\App\Model\Users;

$controller = new SignupController();
$controller->show(new Users());

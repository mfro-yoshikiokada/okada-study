<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Users/LogoutController.php';

use bbs\App\Controller\LogoutController;

$controller = new LogoutController();
$controller->logOut();

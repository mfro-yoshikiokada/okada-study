<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Users/LoginController.php';

use bbs\App\Controller\LoginController;


$controller = new LoginController();
$controller->show();

<?php



require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Users/LoginController.php';
require_once __DIR__ . '/../../App/Model/Login.php';

use bbs\App\Controller\LoginController;
use bbs\App\Model\Login;

$controller = new LoginController();
$controller->login(new Login(), $_POST);

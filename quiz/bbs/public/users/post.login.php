<?php



require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Users/LoginController.php';
require_once __DIR__ . '/../../App/Model/Users.php';

use bbs\App\Controller\LoginController;
use bbs\App\Model\Users;

$controller = new LoginController();
$controller->login(new Users(), $_POST);

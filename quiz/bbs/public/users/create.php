<?php



require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../App/Controller/Comment/SignupController.php';
require_once __DIR__ . '/../../App/Model/Signup.php';

use bbs\App\Controller\Signup\SignupController;
use bbs\App\Model\Signup;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = $_POST;

}


$controller = new SignupController();
$controller->create(new Signup(), $postData);

<?php

session_start();

if (isset($_SESSION["id"])) {
    header('Location:public/comment/');
} else {
    header('Location:public/users/login.php');
}

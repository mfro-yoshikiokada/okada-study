<?php

if (isset($_SESSION["id"])) {
    header('Location:/comment/');
} else {
    header('Location:users/login.php');
}

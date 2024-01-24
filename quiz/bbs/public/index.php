<?php

if (isset($_SESSION["id"])) {
    header('Location:users/login.php');
} else {
    header('Location:comment/');
}

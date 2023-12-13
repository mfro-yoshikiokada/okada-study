<?php
session_start();
$_SESSION['id'] = 3;
$_SESSION['name'] = 'Yuki';
$_SESSION['year'] = 2019;
unset($_SESSION['name']);
var_dump($_SESSION);
// array(2) { ["id"]=> int(3) ["year"]=> int(2019) }
$_SESSION = array();
var_dump($_SESSION);
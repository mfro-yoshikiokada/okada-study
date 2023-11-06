<?php

require_once "Rational.php";

use Rational\problem4\Rational;

$half = new Rational(3315, 8177);
$quarter = new Rational(6, 9);
echo $half->display(); // 「1/2」が出力される
echo $quarter->display(); // 「1/4」が出力される

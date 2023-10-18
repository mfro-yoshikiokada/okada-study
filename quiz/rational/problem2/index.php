<?php

require_once "Rational.php";

use Rational\problem2\Rational;

$quarter = new Rational(1, 4);
echo $quarter->display(); // 「1/4」が出力される
echo $quarter->number(1); // 「0.3」が出力される
echo $quarter->number();  // 「0.25」が出力される

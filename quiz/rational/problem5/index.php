<?php

require_once "Rational.php";

use Rational\problem5\Rational;

$half = new Rational(1, 2);
$quarter = new Rational(1, 4);

$result = $half->add($quarter);

echo $half->display();    // 「1/2」が出力される
echo "<br/>";
echo $quarter->display(); // 「1/4」が出力される
echo "<br/>";
echo $result->display();  // 「3/4」が出力される

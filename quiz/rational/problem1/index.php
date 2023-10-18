<?php
require_once "Rational.php";

use Rational\problem1\Rational;

$half = new Rational(1, 2);
echo $half->numerator; // 「1」が出力される
echo $half->denominator; // 「2」が出力される

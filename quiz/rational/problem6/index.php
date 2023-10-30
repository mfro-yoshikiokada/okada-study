<?php

require_once "RationalInterface.php";
require_once "Rational.php";
require_once "MutableRational.php";

use Rational\problem6\RationalInterface;
use Rational\problem6\Rational;
use Rational\problem6\MutableRational;

$half = new Rational(1, 2);
$mutableHalf = new MutableRational(1, 2);
$quarter = new Rational(1, 4);
$result1 = $half->add($quarter);
$result2 = $mutableHalf->add($quarter);

echo $half->display();        // 「1/2」が出力される
echo $mutableHalf->display(); // 「3/4」が出力される
echo $result1->display();     // 「3/4」が出力される
echo $result2->display();     // 「3/4」が出力される

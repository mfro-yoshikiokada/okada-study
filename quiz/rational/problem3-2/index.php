<?php
require_once "Rational.php";

use Rational\problem32\Rational;


$ok = new Rational(1, 2);    // 例外発生なし
$ng = new Rational(1, 1.2); // 例外発生
$ng2 = new Rational(1, 0);   // 例外発生

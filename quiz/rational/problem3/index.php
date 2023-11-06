<?php
require_once "Rational.php";

use Rational\problem3\Rational;

try {
    $ok = new Rational(1, 2);    // 例外発生なし
    echo "<br/>";
} catch (\Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $ng = new Rational(1, 1.2); // 例外発生
    echo "<br/>";
} catch (\Exception $e) {
    echo $e->getMessage() . "\n";
}
try {
    $ng2 = new Rational(1, 0);   // 例外発生
    echo "<br/>";
} catch (\Exception $e) {
    echo $e->getMessage() . "\n";
}

<?php
class Rational
{
    public int $numerator;
    public int $denominator;
}

$half = new Rational(1, 2);
echo $half->numerator; // 「1」が出力される
echo $half->denominator; // 「2」が出力される

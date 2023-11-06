<?php
namespace Rational\problem1;

class Rational
{
    public int $numerator;
    public int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator= $numerator;
        $this->denominator=$denominator;
    }
}

<?php
namespace Rational\problem3;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct($numerator, $denominator)
    {
        if ($denominator == 0 || !is_int($numerator) || !is_int($denominator)) {
            throw new \Exception("Invalid input");
        }
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }
}

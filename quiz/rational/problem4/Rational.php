<?php

namespace Rational\problem4;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $originalNumerator = $numerator;
        $originalDenominator = $denominator;
        $remainder = 1;
        $newNumerator = 0;
        $newDenominator = 0;
        while ($remainder != 0) {
            $remainder = $denominator % $numerator;
            if ($remainder == 0) {
                $greatestCommonDivisor = $numerator;
                $newNumerator = $originalNumerator / $greatestCommonDivisor;
                $newDenominator = $originalDenominator / $greatestCommonDivisor;
            } else {
                $denominator = $numerator;
                $numerator = $remainder;
            }
        }
        $this->numerator = $newNumerator;
        $this->denominator = $newDenominator;
    }


    public function display():string
    {
        return "$this->numerator / $this->denominator";
    }
}

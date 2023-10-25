<?php

namespace Rational\problem5;
use MongoDB\BSON\RegexInterface;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator= $numerator;
        $this->denominator=$denominator;
    }
    private function approx(int $numerator, int $denominator)
    {
        $originalNumerator=$numerator;
        $originalDenominator=$denominator;
        $remainder = 1;
        $newNumerator= 0;
        $newDenominator = 0;
        while ($remainder != 0) {
            $remainder = $denominator% $numerator;
            if ($remainder==0) {
                $greatestCommonDivisor=$numerator;
                $newNumerator= $originalNumerator/$greatestCommonDivisor;
                $newDenominator= $originalDenominator/$greatestCommonDivisor;
            } else {
                $denominator=$numerator;
                $numerator=$remainder;
            }
        }
        return [$newNumerator,$newDenominator];
    }

    public function display()
    {
        return "$this->numerator / $this->denominator";
    }

    public function add($other)
    {
        if ($other instanceof Rational) {
            $denominatorMultiplied=$this->denominator * $other->denominator;
            $moleculeMultiplied=$this->denominator*$other->numerator+$other->denominator*$this->numerator;
            $result= $this->approx($moleculeMultiplied, $denominatorMultiplied);
            return new Rational($result[0], $result[1]);
        } else {
            echo "error";
        }
    }
}

<?php

namespace Rational\problem6;

class Rational implements RationalInterface
{
    public int $numerator;
    public int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator= $numerator;
        $this->denominator=$denominator;
    }
    private function eugrit(int $numerator, int $denominator)
    {
        $originalNumerator = $numerator;
        $originalDenominator = $denominator;
        $remainder = 1;
        while ($remainder != 0) {
            $remainder = $denominator % $numerator;
            if ($remainder==0) {
                $greatestCommonDivisor = $numerator;
                $numerator = $originalNumerator / $greatestCommonDivisor;
                $denominator = $originalDenominator / $greatestCommonDivisor;
            } else {
                $denominator = $numerator;
                $numerator = $remainder;
            }
        }
        return [$numerator,$denominator];
    }
    private function approx(int $numerator, int $denominator) :array
    {
        $result = $this->eugrit($numerator, $denominator);
        return $result;
    }

    public function display():string
    {
        return "$this->numerator / $this->denominator";
    }

    public function number():int
    {
        return $this->numerator % $this->denominator;
    }

    public function add(RationalInterface $other): Rational
    {
        $denominatorMultiplied = $this->denominator * $other->denominator;
        $moleculeMultiplied = $this->denominator * $other->numerator + $other->denominator * $this->numerator;
        $result= $this->approx($moleculeMultiplied, $denominatorMultiplied);
        return new Rational($result[0], $result[1]);
    }

    public function sub(RationalInterface $other): Rational
    {
        $denominatorMultiplied = $this->denominator * $other->denominator;
        $moleculeMultiplied = $this->denominator * $other->numerator - $other->denominator * $this->numerator;
        $result= $this->approx($moleculeMultiplied, $denominatorMultiplied);
        return new Rational($result[0], $result[1]);
    }
}

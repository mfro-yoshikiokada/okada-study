<?php

namespace Rational\problem6;

class Rational
{
    public int $numerator;
    public int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator= $numerator;
        $this->denominator=$denominator;
    }
    private function approx(int $numerator, int $denominator) :array
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

    public function display():string
    {
        return "$this->numerator / $this->denominator";
    }

    public function number():string
    {
        return $this->numerator % $this->denominator;
    }

    public function add($other)
    {
        $denominatorMultiplied = $this->denominator * $other->denominator;
        $moleculeMultiplied = $this->denominator * $other->numerator + $other->denominator * $this->numerator;
        $result= $this->approx($moleculeMultiplied, $denominatorMultiplied);
        if ($other instanceof MutableRational) {
            $this->numerator = $result[0];
            $this->denominator = $result[1];
            return $this;
        } else {
            return new Rational($result[0], $result[1]);
        }
    }

    public function sub($other)
    {
        $denominatorMultiplied = $this->denominator * $other->denominator;
        $moleculeMultiplied = $this->denominator * $other->numerator - $other->denominator * $this->numerator;
        $result= $this->approx($moleculeMultiplied, $denominatorMultiplied);
        if ($other instanceof MutableRational) {
            $this->numerator = $result[0];
            $this->denominator = $result[1];
            return $this;
        } else {
            return new Rational($result[0], $result[1]);
        }
    }
}


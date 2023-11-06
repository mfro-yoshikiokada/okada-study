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
    private function eugrit(int $numerator, int $denominator) :int
    {
        while ($denominator !== 0) {
            $temp = $denominator;
            $denominator = $numerator % $denominator;
            $numerator = $temp;
        }
        return $numerator;
    }
    private function approx(int $numerator, int $denominator) :array
    {
        $res= $this->eugrit($numerator, $denominator);
        $newNumerator = $numerator / $res;
        $newDenominator = $denominator / $res;
        return [$newNumerator, $newDenominator];
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

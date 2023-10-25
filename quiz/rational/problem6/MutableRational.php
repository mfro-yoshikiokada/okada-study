<?php
namespace Rational\problem6;

require_once "RationalInterface.php";

use Rational\problem6\RationalInterface;

class MutableRational implements RationalInterface
{
    public int $numerator;
    public int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    public function display()
    {
        return "$this->numerator / $this->denominator";
    }

    public function add($other)
    {
            $denominatorMultiplied = $this->denominator * $other->denominator;
            $moleculeMultiplied = $this->denominator * $other->numerator + $other->denominator * $this->numerator;
            $result = $this->approx($moleculeMultiplied, $denominatorMultiplied);
            $this->numerator = $result[0];
            $this->denominator = $result[1];
            return new MutableRational($result[0], $result[1]);
    }

    private function approx(int $numerator, int $denominator)
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
                $newDenominator = $originalDenominator / $greatestCommonDenominator;
            } else {
                $denominator = $numerator;
                $numerator = $remainder;
            }
        }
        return [$newNumerator, $newDenominator];
    }
}

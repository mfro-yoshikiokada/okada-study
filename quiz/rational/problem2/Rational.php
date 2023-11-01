<?php
namespace Rational\problem2;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator= $numerator;
        $this->denominator=$denominator;
    }

    public function display():string
    {
        return "$this->numerator / $this->denominator";
    }

    public function number(int $precision = 2):float
    {
            return round($this->numerator / $this->denominator, $precision);
    }
}

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

    public function display()
    {

        return "$this->numerator / $this->denominator";
    }

    public function number($precision = null)
    {
        if ($precision === null) {
            return round($this->numerator / $this->denominator, 2);
        } else {
            return round($this->numerator / $this->denominator, $precision);
        }
    }
}

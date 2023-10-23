<?php
namespace Rational\problem3;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct($numerator, $denominator)
    {
        try
        {
            if ($numerator == 0 || $denominator == 0 || !is_int($numerator) || !is_int($denominator)) {
                throw new \Exception("Invalid input");
            }
            $this->numerator = $numerator;
            $this->denominator = $denominator;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

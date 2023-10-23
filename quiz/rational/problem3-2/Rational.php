<?php
namespace Rational\problem32;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct($numerator, $denominator)
    {
        try {
            if ($numerator == 0 || $denominator == 0) {
                throw new \Exception("値がゼロです");
            }

            if (is_int($numerator) || is_int($denominator)) {
                throw new \Exception("整数ではありません");
            }
            $this->numerator = $numerator;
            $this->denominator = $denominator;
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
            exit();
        }
    }
}

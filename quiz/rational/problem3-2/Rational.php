<?php
namespace Rational\problem32;

namespace Rational\problem32;

class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        if ($denominator == 0) {
            throw new \Exception("値がゼロです");
        }

        if (!is_int($numerator) || !is_int($denominator)) {
            throw new \Exception("整数ではありません");
        }

        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }
}

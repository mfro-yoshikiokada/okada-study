<?php


class Rational {
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $originalNumerator=$numerator;
        $originalDenominator=$denominator;
        $remainder = 1;
        $newNumerator= 0;
        $newDenominator = 0;
        while($remainder != 0)
        {
            $remainder = $denominator% $numerator;
            if($remainder==0)
            {
                $greatestCommonDivisor=$numerator;
                $newNumerator= $originalNumerator/$greatestCommonDivisor;
                $newDenominator= $originalDenominator/$greatestCommonDivisor;
            }else
            {
                $denominator=$numerator;
                $numerator=$remainder;
            }
        }
        $this->numerator= $newNumerator;
        $this->denominator=$newDenominator;
    }

    public function display()
    {
        return "$this->numerator / $this->denominator";
    }
}

$half = new Rational(3315, 8177);
$quarter = new Rational(6, 9);
echo $half->display(); // 「1/2」が出力される
echo $quarter->display(); // 「1/4」が出力される

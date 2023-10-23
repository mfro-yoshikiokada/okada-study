<?php

class Rational {
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator= $numerator;
        $this->denominator=$denominator;
    }
    private function approx(int $numerator,int $denominator)
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
        return [$newNumerator,$newDenominator];
    }

    public function display () {

        return "$this->numerator / $this->denominator";
    }

    public function add($other){
        if ($other instanceof Rational) {
            $denominatorMultiplied=$this->denominator * $other->denominator;
            $moleculeMultiplied=$denominatorMultiplied*$other->numerator+$denominatorMultiplied*$this->numerator;
            $result= $this->approx( $moleculeMultiplied, $denominatorMultiplied);
            $this->numerator=$result[1];
            echo $result[1];
            echo "<br/>";
            $this->denominator=$result[0];
            echo $result[0];
            echo "<br/>";
        }
    }
}

$half = new Rational(1, 2);
$quarter = new Rational(1, 4);

$result = $half->add($quarter);

echo $half->display();    // 「1/2」が出力される
echo $quarter->display(); // 「1/4」が出力される
echo $result->display();  // 「3/4」が出力される

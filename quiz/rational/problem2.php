<?php
class Rational
{
    // この中を実装する
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator,int $denominator)
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

$quarter = new Rational(1, 4);
echo $quarter->display(); // 「1/4」が出力される
echo $quarter->number(1); // 「0.3」が出力される
echo $quarter->number();  // 「0.25」が出力される

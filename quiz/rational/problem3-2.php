<?php
class Rational
{
    private int $numerator;
    private int $denominator;

    public function __construct($numerator, $denominator)
    {
        try {

            if ($numerator==0 || $denominator==0) {
                throw new \Exception("値がゼロです");

            }
            if(is_int($numerator) || is_int($denominator)) {
                throw new \Exception("整数ではありません");
            }
            $this->numerator= $numerator;
            $this->denominator=$denominator;


        }catch (Exception $e) {
            echo $e->getMessage()."\n";
            exit();
        }
    }
}

$ok = new Rational(1, 2);    // 例外発生なし
$ng = new Rational(1, 1.2); // 例外発生
$ng2 = new Rational(1, 0);   // 例外発生
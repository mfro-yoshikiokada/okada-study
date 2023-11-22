<?php


namespace Quiz\Puzzle\Q05;

class Answer2 implements AnswerInterface
{
    const COIN_500 = 500;

    private int $maxCoins;

    public function __construct()
    {
        $this->maxCoins = 15;
    }

    public function exec(int $bill): int
    {
        $total =0;
        $result=0;
        while ($bill>$total) {
            $total = $total+ self::COIN_500;
            if ($bill == $total) {
                $result++;
            }
            echo $total;
        }
        return $result;
    }
}

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
        $coinCount = 0;
        $result=0;
        while ($bill > $total && $this->maxCoins > $coinCount) {
            $total = $total+ self::COIN_500;
            $coinCount++;
            if ($bill == $total) {
                $result++;
            }
            echo $total;
        }
        return $result;
    }
}

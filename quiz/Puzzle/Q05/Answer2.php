<?php


namespace Quiz\Puzzle\Q05;

class Answer2 implements AnswerInterface
{
    const COIN_500 = 500;
    const COIN_100 = 100;

    private int $maxCoins;

    public function __construct()
    {
        $this->maxCoins = 15;
    }

    public function exec(int $bill): int
    {
        $total =0;
        $coinCount = [0,0];
        $result=0;
        while ($coinCount[1] * self::COIN_500 < $bill) {
            if ($coinCount[0] * self::COIN_100>= $bill || $coinCount[0] == $this->maxCoins) {
                $total = $total - $coinCount[0] * self::COIN_100 +self::COIN_500;
                $coinCount[0] = 0;
                $coinCount[1]++;
            } else {
                $total = $total+ self::COIN_100;
                $coinCount[0]++;
            }
            if ($bill == $total) {
                $result++;
            }
        }
        return $result;
    }
}

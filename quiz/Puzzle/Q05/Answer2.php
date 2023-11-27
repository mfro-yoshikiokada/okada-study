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
        $result=0;
        $numberOfLoops500 =$bill / self::COIN_500;
        if ($numberOfLoops500 > $this->maxCoins*self::COIN_500) {
            $numberOfLoops500 = $this->maxCoins*self::COIN_500;
        }
        $numberOfLoops100 =$bill / self::COIN_100;
        if ($numberOfLoops100 > $this->maxCoins*self::COIN_100) {
            $numberOfLoops100 = $this->maxCoins*self::COIN_100;
        }
        for ($count = -1; $count < $numberOfLoops500; $count++) {
            for ($count100 = -1; $count100 < $numberOfLoops100; $count100++) {
                if ($bill ==$total) {
                    $result++;
                }
                $total = $total+ self::COIN_100;
            }
            $total = self::COIN_500;
        }
        return $result;
    }
}

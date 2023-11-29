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
        $numberOfLoops100 =$bill / self::COIN_100;
        for ($count = -1; $count < $numberOfLoops500 && $total <= $bill; $count++) {
            for ($count100 = -1; $count100 < $numberOfLoops100 && $total <= $bill; $count100++) {
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

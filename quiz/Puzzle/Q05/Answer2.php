<?php


namespace Quiz\Puzzle\Q05;

class Answer2 implements AnswerInterface
{
    const COIN_500 = 500;
    const COIN_100 = 100;
    const COIN_50 = 50;
    const COIN_10 = 10;

    private int $maxCoins;

    public function __construct()
    {
        $this->maxCoins = 15;
    }

    public function exec(int $bill): int
    {
        $total =0;
        $result=0;
        $coinCount = 0;
        $numberOfLoops500 =$bill / self::COIN_500;
        $numberOfLoops100 =$bill / self::COIN_100;
        $numberOfLoops50 =$bill / self::COIN_50+1;
        $numberOfLoops10 =$bill / self::COIN_10+1;
        for ($count = -1; $count < $numberOfLoops500 && $total <= $bill; $count++) {
            $cnt100=0;
            for ($count100 = -1; $count100 < $numberOfLoops100
            && $total <= $bill
            && $coinCount-1 <$this->maxCoins; $count100++
            ) {
                $cnt50=0;
                $cnt100++;
                for ($count50 = -1; $count50 < $numberOfLoops50
                && $total <= $bill
                && $coinCount-1 <$this->maxCoins; $count50++
                ) {
                    $cnt10=0;
                    $cnt50++;
                    for ($count10 = -2; $count10 < $numberOfLoops10
                    && $total <= $bill
                    && $coinCount-1 <$this->maxCoins; $count10++
                    ) {
                        $cnt10++;
                        if ($bill ==$total) {
                            $result++;
                        }
                        $total = $total+ self::COIN_10;
                        $coinCount++;
                    }
                    $coinCount = $coinCount-$cnt10;
                    $total = $total - self::COIN_10*$cnt10;
                    $total = $total + self::COIN_50;
                    $coinCount++;
                }
                $coinCount = $coinCount-$cnt50;
                $total = $total - self::COIN_50*$cnt50;
                $total =  $total +self::COIN_100;
                $coinCount++;
            }
            $coinCount = $coinCount-$cnt100;
            $total = $total - self::COIN_100*$cnt100;
            $total =  $total + self::COIN_500;
            $coinCount++;
        }
        return $result;
    }
}

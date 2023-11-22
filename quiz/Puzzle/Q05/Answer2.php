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

    }
}

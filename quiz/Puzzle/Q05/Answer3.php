<?php

namespace Quiz\Puzzle\Q05;

class Answer3 implements AnswerInterface
{
    const MAX_COIN = 15;

    private int $count = 0;
    private array $coins;

    public function setCoinTypes(array $coins): void
    {
        rsort($coins);
        $this->coins = $coins;
    }

    public function exec(int $bill): int
    {
        $this->count($bill, $this->coins, self::MAX_COIN);
        return $this->count;
    }

    public function count(int $target, array $coins, int $max_coin): void
    {
        $coin = array_shift($coins);
        if (!$coins) {
            if ($target / $coin <= $max_coin) {
                $this->count += 1;
            }
            return;
        }

        for ($i = 0; $i <= $target / $coin; $i++) {
            $this->count($target - $coin * $i, $coins, $max_coin - $i);
        }
    }
}

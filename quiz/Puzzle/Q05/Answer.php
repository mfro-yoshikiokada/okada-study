<?php


namespace Quiz\Puzzle\Q05;

class Answer implements AnswerInterface
{
    private array $coins;
    private int $maxCoins;

    public function __construct()
    {
        $this->maxCoins = 15;
    }

    public function setCoinTypes(array $coins): void
    {
        $this->coins = $coins;
    }
    private function totalCalculation(array $coinCount, int $bill): bool
    {
        $total=0;
        for ($count = 0; $count < count($this->coins); $count++) {
            if ($coinCount[$count] !== 0) {
                $total= $total+ $coinCount[$count] * $this->coins[$count];
            }
        }
        return $total === $bill;
    }

    private function upperLimitConfirmation(array $coinCount): array
    {
        for ($count = 0; $count < count($this->coins)-1; $count++) {
            if ($coinCount[$count]==$this->maxCoins+1) {
                $coinCount[$count]=0;
                $coinCount[$count+1]=$coinCount[$count+1]+1;
            } else {
                break;
            }
        }
        return $coinCount;
    }

    public function exec(int $bill): int
    {
        $coinCount = [];
        $result = 0;
        for ($count = 0; $count < count($this->coins); $count++) {
            array_push($coinCount, 0);
        }
        while ($coinCount[count($this->coins)-1]!==$this->maxCoins) {
            $coinCount[0]++;
            $coinCount = $this->upperLimitConfirmation($coinCount);
            $result += $this->totalCalculation($coinCount, $bill);
        }
        return $result;
    }
}

<?php


namespace Quiz\Puzzle\Q05;

class Answer implements AnswerInterface
{
    private array $coins;
    private int $maxCoins;
    private array $coinCount;

    public function __construct()
    {
        $this->maxCoins = 15;
    }

    public function setCoinTypes(array $coins): void
    {
        rsort($coins);
        $this->coins = $coins;
        $this->coinCount = [];
        for ($count = 0; $count < count($this->coins); $count++) {
            array_push($this->coinCount, 0);
        }
    }

    private function totalCalculation(array $coinCount, int $bill): bool
    {
        $total=0;
        $totalCoins=0;
        for ($count = 0; $count < count($this->coins); $count++) {
            $total= $total+ $coinCount[$count] * $this->coins[$count];
            $totalCoins +=$coinCount[$count];
        }

        if ($totalCoins <= $this->maxCoins) {
            return $total === $bill;
        } else {
            return false;
        }
    }


    private function upperLimitConfirmation(array $coinCount, int $bill): array
    {
        for ($count = 0; $count < count($this->coins)-1; $count++) {
            if ($coinCount[$count]==$this->maxCoins+1 || $coinCount[$count]*$this->coins[$count] > $bill) {
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
        $result = 0;
        $forCun = 0;
        for ($count = 0; $count < pow($this->maxCoins, count($this->coinCount)); $count++) {
            $this->coinCount[0]++;
            $this->coinCount = $this->upperLimitConfirmation($this->coinCount, $bill);
            $result += $this->totalCalculation($this->coinCount, $bill);
            $CountCoin = 0;
            foreach ($this->coinCount as $coin) {
                $CountCoin=+$coin;
            }
            if ($CountCoin > $this->maxCoins) {
                break;
            }
            $forCun++;
        }
    }
}

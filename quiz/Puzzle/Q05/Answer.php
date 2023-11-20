<?php


namespace Quiz\Puzzle\Q05;

class Answer implements AnswerInterface
{
    private array $coins;
    private int $maxCoins;
    private array $coinCount;
    private int $loop_count = 0;

    public function __construct()
    {
        $this->maxCoins = 15;
    }

    public function setCoinTypes(array $coins): void
    {
        sort($coins);
        $this->coins = $coins;
        $this->coinCount = [];
        for ($count = 0; $count < count($this->coins); $count++) {
            array_push($this->coinCount, 0);
        }
    }

    private function totalCalculation(array $coinCount, int $bill): array
    {
        $total=0;
        $totalCoins=0;
        $calculatorRoundUp = false;
        for ($count = 0; $count < count($this->coins); $count++) {
            $total= $total+ $coinCount[$count] * $this->coins[$count];
            $totalCoins +=$coinCount[$count];
            $this->loop_count++;
            if ($coinCount[$count] * $this->coins[$count] > $bill) {
                $calculatorRoundUp = true;
            }
            $this->loop_count++;
        }
        if ($totalCoins <= $this->maxCoins) {
            return array ($total === $bill, $totalCoins, $calculatorRoundUp);
        } else {
            return array (false, $totalCoins, $calculatorRoundUp);
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
        for ($count = 0; $count < pow($this->maxCoins, count($this->coinCount)); $count++) {
            $this->coinCount[0]++;
            $this->coinCount = $this->upperLimitConfirmation($this->coinCount, $bill);
            $calculation = $this->totalCalculation($this->coinCount, $bill);
            $result += $calculation[0];

            if ($this->coinCount[count($this->coins)-1]* $this->coins[count($this->coins)-1]>= $bill) {
                break;
            }
            if ($this->coinCount[count($this->coins)-1] > $this->maxCoins) {
                break;
            }
        }
        var_dump($this->loop_count++);
        return $result;
    }
}

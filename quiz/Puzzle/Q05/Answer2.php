<?php


namespace Quiz\Puzzle\Q05;

class Answer2 implements AnswerInterface
{
    private array $coins;
    private int $maxCoins;
    private array $coinCount;
    private int $bill;
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


    private function Calculate(): array {
        $total=0;
        $totalCoins=0;
        $calculatorRoundUp = false;
        for ($count = 0; $count < count($this->coins); $count++) {
            if ($this->coinCount[$count]==$this->maxCoins+1 || $this->coinCount[$count]*$this->coins[$count] > $this->bill) {
                $this->coinCount[$count]=0;
                $this->coinCount[$count+1]=$this->coinCount[$count+1]+1;
            }

            $total= $total+ $this->coinCount[$count] * $this->coins[$count];
            $totalCoins +=$this->coinCount[$count];

            if ($this->coinCount[$count] * $this->coins[$count] > $this->bill) {
                $calculatorRoundUp = true;
            }
            $this->loop_count++;
        }
        if ($totalCoins <= $this->maxCoins) {
            return array ($total === $this->bill, $totalCoins, $calculatorRoundUp);
        } else {
            return array (false, $totalCoins, $calculatorRoundUp);
        }
    }

    public function exec(int $bill): int
    {
        $this->bill = $bill;
        $result = 0;
        for ($count = 0; $count < pow($this->maxCoins, count($this->coinCount)); $count++) {
            $this->coinCount[0]++;
            $calculation = $this->Calculate();
            $result += $calculation[0];

            if ($this->coinCount[count($this->coins)-1]* $this->coins[count($this->coins)-1]>= $this->bill) {
                break;
            }
            if ($this->coinCount[count($this->coins)-1] > $this->maxCoins) {
                break;
            }
        }
        return $result;
    }
}

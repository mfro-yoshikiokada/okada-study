<?php


namespace Quiz\Puzzle\Q03;

class Answer
{

    public function exec():array
    {
        $result = [];
        $calculationUpperLimit = 100;
        for ($num = 1; $num <= 100; $num++) {
            $result[] = true;
        }
        for ($calculationNum = 2; $calculationNum <= $calculationUpperLimit; $calculationNum++) {
            for ($arrayNum = 0; $arrayNum < 100; $arrayNum = $arrayNum + $calculationNum) {
                if (($arrayNum % $calculationNum) ==0) {
                    $result[$arrayNum] = !$result[$arrayNum];
                }
            }
        }
        $resultArray=[];
        foreach ($result as $nam => $res) {
            if ($res && $nam !== 0) {
                $resultArray[]= $nam;
            }
        }
        return  $resultArray;
    }
}

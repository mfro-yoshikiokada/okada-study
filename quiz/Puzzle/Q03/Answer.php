<?php


namespace Quiz\Puzzle\Q03;

class Answer implements AnswerInterface
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
                    $result[$arrayNum] = !$result[$arrayNum];
            }
        }
        $resultArray=[];
        foreach ($result as $num => $res) {
            if ($res && $num !== 0) {
                $resultArray[]= $num;
            }
        }
        return  $resultArray;
    }
}

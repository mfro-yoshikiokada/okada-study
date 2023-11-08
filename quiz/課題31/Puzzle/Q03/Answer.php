<?php


namespace Quiz\Puzzle\Q03;

class Answer implements AnswerInterface
{

    public function exec():array
    {
        $result = [];
        $calculationUpperLimit = 100;
        for ($num = 1; $num <= 100; $num++) {
            array_push($result, true);
        }
        for ($calculationNum = 2; $calculationNum <= $calculationUpperLimit; $calculationNum++ ){
            for ($arrayNum = 1; $arrayNum < 100; $arrayNum++ ){
                if (($arrayNum%$calculationNum) ==0) {
                    if ($result[$arrayNum]) {
                        $result[$arrayNum]=false;
                    } else {
                        $result[$arrayNum]=true;
                    }
                }
            }
        }
        $resultArray=[];
        for ($num = 1; $num < 100; $num++) {
            if ($result[$num]) {
                array_push($resultArray, $num);
            }
        }
        return  $resultArray;
    }
}

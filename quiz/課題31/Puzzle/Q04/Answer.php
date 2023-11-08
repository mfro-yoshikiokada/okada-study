<?php

namespace Quiz\Puzzle\Q04;

class Answer
{
    public function exec($stickSize, $people)
    {
        $cutTimes = $stickSize - 1 ;
        $cutNum = [1];
        $result = 0;
        for ($i = 0; $i <= $cutTimes; $i++) {
            array_push($cutNum,$cutNum[$i]*2);
        }
        $whileCount = 0;
        while ($cutTimes >= 0) {
            if ($cutNum[$whileCount] >= $people) {
                $cutTimes = $cutTimes-$people;
                $result++;
            } else {
                $cutTimes = $cutTimes - $cutNum[$whileCount];
                $result++;
            }
            $whileCount++;
        }
        return $result;
    }

}
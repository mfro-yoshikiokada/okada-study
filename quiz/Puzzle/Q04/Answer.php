<?php

namespace Quiz\Puzzle\Q04;

class Answer implements AnswerInterface
{
    public function exec(int $stickSize, int $people):int
    {
        $cutTimes = $stickSize - 1 ;
        $cutNum = [1];
        $result = 0;
        for ($i = 0; $i <= $cutTimes; $i++) {
            $cutNum[] = $cutNum[$i] * 2;
        }
        $whileCount = 0;
        while ($cutTimes >= 0) {
            $cutTimes -= ($cutNum[$whileCount] >= $people) ? $people : $cutNum[$whileCount];
            $result++;
            $whileCount++;
        }
        return $result;
    }
}

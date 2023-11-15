<?php

namespace Quiz\Puzzle\Q04;

class Answer implements AnswerInterface
{
    public function exec(int $stickSize, int $people):int
    {
        $cutTimes = $stickSize - 1 ;
        $cutNum = [1];
        $result = 0;
        while ($cutTimes >= 0) {
            $cutNum[] = $cutNum[$result] * 2;
            $cutTimes -= ($cutNum[$result] >= $people) ? $people : $cutNum[$result];
            $result++;
        }
        return $result;
    }
}

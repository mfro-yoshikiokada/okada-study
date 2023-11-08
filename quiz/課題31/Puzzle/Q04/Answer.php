<?php

namespace Quiz\Puzzle\Q04;

class Answer
{
    public function exec($stickSize, $people)
    {
        $cutTimes = $stickSize - 1 ;
        $cutNum= [1];
        $result = 0;
        for ($i = 0; $i <= $cutTimes; $i++) {

            array_push($cutNum,$cutNum[$i]*2);
        }
        echo "<br/>";
        var_dump($cutNum);
        $whileCount=0;
        while ($cutTimes>=0) {
            echo "<br/>";
            echo "whileCount";
            echo "$whileCount";
            if ($cutNum[$whileCount] >= $people) {
                echo "<br/>";
                echo "カットできる人数";
                echo "$cutNum[$whileCount]";

                echo "<br/>";
                echo "人数";
                echo "$people";
                $cutTimes = $cutTimes-$people;
                echo "<br/>";
                echo "残りカット数";
                echo "$cutTimes";
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
<?php
require_once 'AnswerInterface.php';
require_once 'Answer.php';

use Quiz\Puzzle\Q05\AnswerInterface;
use Quiz\Puzzle\Q05\Answer;

$answer= new Answer();
$answer->setCoinTypes([500, 100, 50, 10,5,1]) ;
$time_start = microtime(true);
var_dump($answer->exec(1000));
$time_end = microtime(true);
$time = $time_end - $time_start;
var_dump($time); //実行時間を出力する

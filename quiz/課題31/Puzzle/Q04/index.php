<?php

require_once 'AnswerInterface.php';
require_once 'Answer.php';

use Quiz\Puzzle\Q04\AnswerInterface;
use Quiz\Puzzle\Q04\Answer;

$answer= new Answer();

$res=$answer->exec(8,3);
var_dump($res);//int(4)

$res=$answer->exec(20,3);
var_dump($res);//int(8)

$res=$answer->exec(100,5);
var_dump($res);//int(22)
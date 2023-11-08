<?php
require_once 'AnswerInterface.php';
require_once 'Answer.php';

use Quiz\Puzzle\Q03\AnswerInterface;
use Quiz\Puzzle\Q03\Answer;

$answer= new Answer();
$res=$answer->exec();
var_dump($res);
//array(9) { [0]=> int(1) [1]=> int(4) [2]=> int(9) [3]=> int(16) [4]=> int(25) [5]=> int(36)
//[6]=> int(49) [7]=> int(64) [8]=> int(81) }

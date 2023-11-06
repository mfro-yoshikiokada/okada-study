<?php
require_once 'AnswerInterface.php';
require_once 'Answer.php';

use Quiz\Puzzle\Q03\AnswerInterface;
use Quiz\Puzzle\Q03\Answer;

$answer= new Answer();
$res=$answer->exec();
var_dump($res);
<?php
require_once 'AnswerInterface.php';
require_once 'Answer.php';

use Quiz\Puzzle\Q05\AnswerInterface;
use Quiz\Puzzle\Q05\Answer;

$answer= new Answer();
$answer->setCoinTypes([10, 50, 100, 500]) ;

var_dump($answer->exec(500));

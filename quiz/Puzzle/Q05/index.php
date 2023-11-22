<?php
require_once 'AnswerInterface.php';
require_once 'Answer2.php';

use Quiz\Puzzle\Q05\AnswerInterface;
use Quiz\Puzzle\Q05\Answer2;

$answer= new Answer2();
var_dump($answer->exec(1000));

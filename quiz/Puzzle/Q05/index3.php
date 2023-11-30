<?php

require_once 'AnswerInterface.php';
require_once 'Answer3.php';

use Quiz\Puzzle\Q05\Answer3;

$answer = new Answer3();
$answer->setCoinTypes([10, 50, 100, 500]);

var_dump($answer->exec(1000));

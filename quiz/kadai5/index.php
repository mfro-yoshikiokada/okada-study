<?php

require_once 'Character.php';
require_once 'Brave.php';
require_once 'Monster.php';
require_once 'Operator.php';

use Quiz\Kadai5\Character;
use Quiz\Kadai5\Brave;
use Quiz\Kadai5\Monster;
use Quiz\Kadai5\Operator;

$ope = new Operator();
$ope->setAlly(new Brave('勇者', 300, 100));
$ope->setEnemy(new Monster('魔王', 400, 100));
$ope->fight();

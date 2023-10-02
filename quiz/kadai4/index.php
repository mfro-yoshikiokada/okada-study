<?php

require_once 'Character.php';
require_once 'Brave.php';
require_once 'Monster.php';

use Quiz\Kadai4\Character;
use Quiz\Kadai4\Brave;
use Quiz\Kadai4\Monster;

$brave = new Brave('異世界転生マン', 1000, 500);
$monster = new Monster(550);
$monster = $brave->attack($monster);
echo ("monsterのHP：" . $monster->getHp());

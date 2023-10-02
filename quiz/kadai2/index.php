<?php
require_once 'brave.php';

use Quiz\Kadai2\Brave;

$c = new Brave('異世界転生マン', 1000, 500);
if ($c->getActive()) {
    echo("私の名前は".$c->getName()."\n");
    echo("HPは".$c->getHp()."\n");
    echo("力は".$c->getPower()."\n");
} else {
    echo "matigai";
}

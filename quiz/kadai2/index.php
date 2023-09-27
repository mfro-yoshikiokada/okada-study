<?php

class Brave {
    public $name;
    public $hp;
    public $power;

    public function __construct($name, $hp, $power) {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
    }

    public function getName() {
        return $this->name;
    }

    public function getHp() {
        return $this->hp;
    }

    public function getPower() {
        return $this->power;
    }

    public function attack() {
        echo "こうげきをした！";
    }
}

$c = new Brave('異世界転生マン', '1000', '500');
echo("私の名前は".$c->getName()."\n");
echo("HPは".$c->getHp()."\n");
echo("力は".$c->getPower()."\n");

?>

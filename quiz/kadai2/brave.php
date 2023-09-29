<?php


namespace Quiz\Kadai2;

class Brave
{
    public $name;
    public $hp;
    public $power;
    public $active=false;

    public function __construct($name, $hp, $power)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
        if (empty($name) && empty($hp) && empty($power)) {
            $this->active= false;
        } else {
            $this->active= true;
        }
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function attack()
    {
        echo "こうげきをした！";
    }
}

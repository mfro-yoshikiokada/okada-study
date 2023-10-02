<?php


namespace Quiz\Kadai2;

class Brave
{
    public $name;
    public $hp;
    public $power;
    public $active = false;

    public function __construct(string $name, int $hp, int $power)
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

    public function getActive():bool
    {
        return $this->active;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getHp():int
    {
        return $this->hp;
    }

    public function getPower():int
    {
        return $this->power;
    }

    public function attack():void
    {
        echo "こうげきをした！";
    }
}

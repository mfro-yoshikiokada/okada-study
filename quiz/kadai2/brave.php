<?php


namespace Quiz\Kadai2;

class Brave
{
    private $name;
    private $hp;
    private $power;


    public function __construct(string $name, int $hp, int $power)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
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

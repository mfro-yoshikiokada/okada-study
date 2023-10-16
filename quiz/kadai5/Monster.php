<?php


namespace Quiz\Kadai5;

class Monster extends Character
{
    public function __construct(string $name, int $hp, int $power)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
    }
}

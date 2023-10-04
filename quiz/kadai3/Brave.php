<?php

namespace Quiz\Kadai3;

class Brave
{
    public $name;
    public $hp;
    public $power;

    public function __construct(string $name, int $hp, int $power)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPower():string
    {
        return $this->power;
    }
    /**
     * @return object
     */
    public function attack(object $monster):object
    {
        $hp = $monster->hp;

        $hp -= $this->power;

        $monster->setHp($hp);

        return $monster;
    }
}

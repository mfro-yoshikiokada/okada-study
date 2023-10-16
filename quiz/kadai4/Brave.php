<?php

namespace Quiz\Kadai4;

class Brave extends Character
{

    protected string $name;
    protected int $power;

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
     * @return int
     */
    public function getPower():int
    {
        return $this->power;
    }

    /**
     * @param Monster
     * @return Monster
     */
    public function attack(Monster $monster):Monster
    {
        $hp = $monster->hp;

        $hp = $hp - $this->power;

        $monster->setHp($hp);

        return $monster;
    }
}

<?php

namespace Quiz\Kadai3;

class Brave
{
    private string $name;
    private int $hp;
    private int $power;

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
     * @param Monster $monster
     * @return Monster
     */
    public function attack(Monster $monster): Monster
    {
        $hp = $monster->getHp();
        $hp -= $this->power;
        $monster->setHp($hp);
        return $monster;
    }
}

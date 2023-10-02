<?php

namespace Quiz\Kadai4;

class Monster extends Character
{

    public function __construct(int $hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return int
     */
    public function getHp():int
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     */
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }
}

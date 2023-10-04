<?php

namespace Quiz\Kadai3;

class Monster
{
    public int $hp;

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
    public function setHp($hp): void
    {
        $this->hp = $hp;
    }
}

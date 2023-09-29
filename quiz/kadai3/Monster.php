<?php

namespace Quiz\Kadai3;

class Monster
{
    public $hp;

    public function __construct($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return mixed
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param mixed $hp
     */
    public function setHp($hp): void
    {
        $this->hp = $hp;
    }
}
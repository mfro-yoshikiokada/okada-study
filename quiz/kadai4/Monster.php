<?php

namespace Quiz\Kadai4;

require_once 'Character.php';

use Quiz\Kadai4\Character;

class Monster extends Character
{

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

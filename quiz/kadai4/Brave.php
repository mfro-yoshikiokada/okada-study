<?php

namespace Quiz\Kadai4;

require_once 'Character.php';

use Quiz\Kadai4\Character;

class Brave extends Character
{

    public function __construct($name, $hp, $power)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    public function attack($monster)
    {
        $hp = $monster->hp;

        $hp = $hp - $this->power;

        $monster->setHp($hp);

        return $monster;
    }
}

<?php

namespace Quiz\Kadai4;

abstract class Character
{
    protected $name="";
    protected $hp;
    protected $power;


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

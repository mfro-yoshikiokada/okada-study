<?php

namespace Quiz\Kadai4;

abstract class Character
{
    protected $name="";
    protected $hp;
    protected $power;


    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }
    /**
     * @return mixed
     */
    public function getPower():int
    {
        return $this->power;
    }

    /**
     * @return mixed
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

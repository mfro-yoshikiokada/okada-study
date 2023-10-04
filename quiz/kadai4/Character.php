<?php

namespace Quiz\Kadai4;

abstract class Character
{
    protected string $name;
    protected int $hp;
    protected int $power;

    /**
     * @return int
     */
    public function getHp(): int
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

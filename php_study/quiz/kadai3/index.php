<?php


class Brave
{
    public $name;
    public $hp;
    public $power;
    const attackPower =50;

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
class Monster {
    public $hp;

    public function __construct( $hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return mixed
     */
    public function getHp()
    {
        echo $this->hp;
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
$brave = new Brave('異世界転生マン', 1000, 500);
$monster = new Monster(550);
$monster = $brave->attack($monster);
echo ("monsterのHP：" . $monster->getHp());
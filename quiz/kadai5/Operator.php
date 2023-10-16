<?php


namespace Quiz\Kadai5;

class Operator
{
    private Brave $ally;
    private Monster $enemy;

    /**
     * @param Brave
     */
    public function setAlly(Brave $arg)
    {
        $this->ally = $arg;
    }

    /**
     * @param Monster
     */
    public function setEnemy(Monster $arg)
    {
        $this->enemy = $arg;
    }

    /**
     * @param Brave $ally
     * @param Monster $enemy
     * @return Monster
     */
    private function attackAlly(Brave $ally, Monster $enemy):Monster
    {
        $hp = $enemy->getHp();

        $hp = $hp - $ally->getPower();

        $enemy->setHp($hp);
        echo "みかたのこうげき<br>";
        echo "てきの残りHP".$hp."<br>";
        return  $enemy;
    }

    /**
     * @param Brave $ally
     * @param Monster $enemy
     * @return Brave
     */
    private function attackEnemy(Brave $ally, Monster $enemy):Brave
    {
        $hp = $ally->getHp();

        $hp = $hp - $enemy->getPower();

        $ally->setHp($hp);
        echo "てきのこうげき<br>";
        echo "みかたの残りHP".$hp."<br>";
        return  $ally;
    }

    public function fight()
    {
        $ally = $this->ally;
        $enemy = $this->enemy;
        while ($ally->getHp()>0) {
            $this->attackAlly($ally, $enemy);
            if ($enemy->getHp()<=0) {
                echo "てきは倒れた";
                break;
            }
            $this->attackEnemy($ally, $enemy);
        }
        if ($ally->getHp()<=0) {
            echo "勇者はたおれた";
        }
    }
}

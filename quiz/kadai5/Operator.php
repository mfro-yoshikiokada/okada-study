<?php


namespace Quiz\Kadai5;



class Operator
{
    public $ally;
    protected $enemy;
    public function setAlly($arg)
    {
        $this->ally = $arg;
    }

    public function setEnemy($arg)
    {
        $this->enemy = $arg;
    }

    private function attackAlly($ally, $enemy)
    {
        $hp = $enemy->getHp();

        $hp = $hp - $ally->getPower();

        $enemy->setHp($hp);
        echo "みかたのこうげき<br>";
        echo "てきの残りHP".$hp."<br>";
        return  $enemy;
    }

    private function attackEnemy($ally, $enemy)
    {
        $hp = $ally->getHp();

        $hp = $hp - $enemy->getPower();

        $ally->setHp($hp);
        echo "てきのこうげき<br>";
        echo "みかたの残りHP".$hp."<br>";
        return  $ally;
    }

    private function dataCheck($e)
    {
        if (empty($e->getName()) && empty($e->getPower()) && empty($e->getHp())) {
            return false;
        } else {
            return true;
        }
    }

    public function fight()
    {
        $ally = $this->ally;
        $enemy = $this->enemy;
        if ($this->dataCheck($ally) && $this->dataCheck($ally)) {
            echo $ally->getHp();
            while ($ally->getHp()>=0) {
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
        } else {
            echo "データを入力してください";
        }
    }
}

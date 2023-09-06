<?php
namespace Fruits;
require_once('./Interfaces/FruitInterface.php');
use Interfaces\FruitInterface;

class Apple implements FruitInterface {
    public function getName(){
        return 'リンゴ';
    }

    public function getColor(){
        return 'red';
    }

    public function getHasLike(){
        return '好き';
    }

    public function getOrderOfPopularity(){
        return 3;
    }

}


<?php

namespace Fruits;
require_once('./Interfaces/FruitInterface.php');
use Interfaces\FruitInterface;


class Orange implements FruitInterface {
    public function getName(){
        return 'みかん';
    }

    public function getColor(){
        return 'orange';
    }

    public function getHasLike(){
        return '好き';
    }

    public function getOrderOfPopularity(){
        return 1;
    }

}


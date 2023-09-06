<?php

namespace Fruits;
require_once('./Interfaces/FruitInterface.php');
use Fruits\FruitInterface;

class Fruit {
    private $fruit;

    public function __construct(FruitInterface $fruit)
    {
        $this->fruit = $fruit;
    }

    public function execute()
    {
        $params = [];
        $params['name'] = $this->fruit->getName();
        $params['color'] = $this->fruit->getColor();
        $params['has_like'] = $this->fruit->getHasLike();
        $params['order_of_popularity'] = $this->fruit->getOrderOfPopularity();
        return $params;
    }
}





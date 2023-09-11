<?php

require_once 'Animal.php';
require_once 'Dog.php';

use MyNamespace\Dog; // MyNamespace\Dog クラスをインポート

$dog = new Dog();
echo $dog->getName() . ' says ' . $dog->makeSound() . PHP_EOL;

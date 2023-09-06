
<?php

namespace MyNamespace;
require_once 'Animal.php';

class Dog extends AbstractAnimal
{
    protected function getName(): string
    {
        return "Dog";
    }

    protected function makeSound(): string
    {
        return "Woof!";
    }
}

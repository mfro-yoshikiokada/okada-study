<?php
namespace MyNamespace;

require_once 'Animal.php';

class Dog extends AbstractAnimal
{
    public function getName(): string
    {
        return "Dog";
    }

    public function makeSound(): string
    {
        return "Woof!";
    }
}

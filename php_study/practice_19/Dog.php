<?php

namespace MyNamespace;

class Dog extends AbstractAnimal
{
public function getName(): string
{
return "Dog";
}

public function makeSound(): string
{
return "Woof! Woof!";
}
}

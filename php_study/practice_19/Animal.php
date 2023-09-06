
<?php

namespace MyNamespace;

abstract class AbstractAnimal
{
    abstract protected function getName(): string;
    abstract protected function makeSound(): string;
}

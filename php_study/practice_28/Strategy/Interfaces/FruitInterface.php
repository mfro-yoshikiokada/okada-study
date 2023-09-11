<?php
namespace Fruits;

interface FruitInterface
{
    public function getName(): string;
    public function getColor(): string;
    public function getHasLike(): bool;
    public function getOrderOfPopularity(): int;
}

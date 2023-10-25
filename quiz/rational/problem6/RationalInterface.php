<?php
namespace Rational\problem6;

interface RationalInterface
{
    public function display();
    public function approx(int $numerator, int $denominator);
    public function add($other);
}

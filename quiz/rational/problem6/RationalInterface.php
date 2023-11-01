<?php
namespace Rational\problem6;

interface RationalInterface
{
    public function display():string;
    public function number():int;
    public function add($other);
    public function sub($other);
}

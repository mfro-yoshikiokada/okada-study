<?php
namespace Rational\problem6;

interface RationalInterface
{
    public function display();
    public function number();
    public function add(Rational|MutableRational $other):Rational|MutableRational;
    public function sub(Rational|MutableRational $other):Rational|MutableRational;
}

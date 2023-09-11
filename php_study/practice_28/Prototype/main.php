<?php
interface Foo
{
public function func1(int $x);
}

abstract class Bar implements Foo {
public function func1(int $x) {
}
abstract public function func2(int $x, double $y);
private function func3() {
}
}

class Baz extends Bar {
public function func1(int $x) {
}
public function func2(int $x, double $y) {
}
protected function func3() {
}
}

class Baaz extends Baz {
public function func2(int $x, double $y) {
}
public function func3() {
}
}

$cl = new ReflectionClass(new Baaz());
$methods = $cl->getMethods();
foreach ($methods as $mt) {
$proto = $mt->getPrototype();
printf("method=%s::%s(), prototype=%s::%s() \n",
$mt->getDeclaringClass()->getName(), $mt->getName(),
$proto->getDeclaringClass()->getName(), $proto->getName());
}
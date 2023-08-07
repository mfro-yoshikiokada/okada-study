<?php
// インターフェースの定義
interface MyInterface {
    public function interfaceMethod(int $name): string ;
}
class callingNumber implements MyInterface {
    public function interfaceMethod(int $name): string
    {
        // TODO: Implement interfaceMethod() method.
        return "この関数の数字は{$name}です。";
    }
}
$echo = new callingNumber();
$echo->interfaceMethod(123);
abstract class AbstractAnimal
{
    //名前のプロパティ
    private $name;

    //名前のゲッタ
    public function getName(): string
    {
        return $this->name;
    }

    //名前のセッタ
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    //鳴き声を得るメソッド。
    abstract public function call(): string;  // (2)
}
class Dog extends AbstractAnimal  // (1)
{
    //鳴き声を得るメソッド
    public function call(): string
    {
        return "わんわん";
    }
}
$zoo= new Dog();
$zoo->call();
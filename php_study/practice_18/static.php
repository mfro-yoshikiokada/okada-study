<?php


class MyClass
{
    // static変数
    public static $staticVariable = 42;

    // staticメソッド
    public static function staticMethod()
    {
        return "This is a static method.";
    }

    // static変数の変更
    public static function changeStaticVariable($newValue)
    {
        self::$staticVariable = $newValue;
    }
}

// static変数へのアクセスとメソッドの呼び出し
echo MyClass::$staticVariable . PHP_EOL; // 42
echo MyClass::staticMethod() . PHP_EOL; // "This is a static method."

// static変数の変更と再アクセス
MyClass::changeStaticVariable(100);
echo MyClass::$staticVariable . PHP_EOL; // 100


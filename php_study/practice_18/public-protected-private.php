<?php


class MyClass
{
    // publicプロパティ
    public $publicProperty = "This is a public property.";

    // protectedプロパティ
    protected $protectedProperty = "This is a protected property.";

    // privateプロパティ
    private $privateProperty = "This is a private property.";

    // publicメソッド
    public function publicMethod()
    {
        return "This is a public method.";
    }

    // protectedメソッド
    protected function protectedMethod()
    {
        return "This is a protected method.";
    }

    // privateメソッド
    private function privateMethod()
    {
        return "This is a private method.";
    }

    // メソッド内からプロパティにアクセスする例
    public function accessProperties()
    {
        $output = "";
        $output .= $this->publicProperty . PHP_EOL;
        $output .= $this->protectedProperty . PHP_EOL;
        $output .= $this->privateProperty . PHP_EOL;
        return $output;
    }
}

class ChildClass extends MyClass
{
    // 子クラスからのアクセス
    public function accessParentProperties()
    {
        $output = "";
        $output .= $this->publicProperty . PHP_EOL; // OK
        $output .= $this->protectedProperty . PHP_EOL; // OK
        // $output .= $this->privateProperty . PHP_EOL; // エラー：プライベートプロパティは子クラスからアクセスできない
        return $output;
    }

    // 子クラスから親クラスのprotectedメソッドにアクセスする
    public function accessParentProtectedMethod()
    {
        return $this->protectedMethod(); // OK
        // return $this->privateMethod(); // エラー：プライベートメソッドは子クラスからアクセスできない
    }
}

// インスタンスの生成と利用
$myObject = new MyClass();

// プロパティへのアクセス
echo $myObject->publicProperty . PHP_EOL; // "This is a public property."


// メソッドの呼び出し
echo $myObject->publicMethod() . PHP_EOL; // "This is a public method."


// メソッド内からプロパティにアクセス
echo $myObject->accessProperties();

// 子クラスからのアクセス
$childObject = new ChildClass();
echo $childObject->accessParentProperties(); // 子クラスから親クラスのプロパティにアクセス
echo $childObject->accessParentProtectedMethod(); // 子クラスから親クラスの保護メソッドにアクセス



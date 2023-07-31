<?php


class ParentClass
{
    protected $text; // インスタンス変数として$textを定義

    public function __construct()
    {
        $this->text = "This is the construct from parent"; // インスタンス変数に代入
    }

    public function echoText()
    {
        echo $this->text . PHP_EOL; // $this->textでインスタンス変数にアクセス
    }
}

class ChildClass extends ParentClass
{
    public function __construct()
    {
        parent::__construct(); // 親クラスのコンストラクタを呼び出す
        $this->text = "This is the construct from child"; // 親クラスのtextをオーバーライド
    }

    public function echoparentText()
    {
        echo $this->text . PHP_EOL; // 親クラスのtextを参照
    }

    // 親クラスのメソッドをオーバーライド
    public function echoText()
    {
        echo "This is the text from child class." . PHP_EOL;
    }
}

// インスタンスの生成と利用
$parentObject = new ParentClass();
$parentObject->echoText(); // "This is the construct from parent"

$childObject = new ChildClass();
$childObject->echoText(); // "This is the text from child class."
$childObject->echoparentText(); // "This is the construct from child"

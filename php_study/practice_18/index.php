<?php
//クラスとは簡単に説明すると、プログラムの処理をまとめたオブジェクトのことで、あらゆるプログラミング言語でクラスは使用されます。
//クラスの中では主に、プロパティ（変数や定数）やメソッド（関数）の定義を記述します。クラスを定義するには、classキーワードを指定し、その次にクラス名を指定します。

class SampleClass
{
    //プロパティの宣言
    public $var = 'This is Sample Class.';

}

//インスタンスの生成
$sample = new SampleClass();

echo $sample->var;
//This is Sample Class.

//親クラス
class ParentClass{

    public function WorkItem1($str){
        echo $str.'ParentClass <br>';
    }

    public function WorkItem2(){
        echo 'Processing of WorkItem2 of ParentClass. <br>';
    }

}

//子クラス
class ChildClass extends ParentClass{

    public function WorkItem1($str){
        echo $str.'ChildClass <br>';
    }

}

//インスタンスを生成
$parent = new ParentClass();
$child = new ChildClass();

//メソッドの呼出し
$parent->WorkItem1('Processing of ');
$child->WorkItem1('Processing of ');

$parent->WorkItem2();
$child->WorkItem2();

//Processing of ParentClass
//Processing of ChildClass
//Processing of WorkItem2 of ParentClass.
//Processing of WorkItem2 of ParentClass.

//抽象クラスとは他のクラスを継承して使用するためのクラスです。
//
//クラスを抽象化すると、そのクラスは直接インスタンスを生成できなくなります。抽象クラスを使用するためにはabstractを指定する必要があります。

//抽象クラス
abstract class AbstractClass
{
    // 抽象メソッドの定義
    abstract protected function getValue();
    abstract protected function getText($str);

    // メソッドの定義
    public function thisClass() {
        echo $this->getValue() . '<br>';
    }
}

class SampleClass1 extends AbstractClass
{
    protected function getValue() {
        return "SampleClass1";
    }

    public function getText($str) {
        return "{$str}SampleClass1";
    }
}

class SampleClass2 extends AbstractClass
{
    public function getValue() {
        return "SampleClass2";
    }

    public function getText($str) {
        return "{$str}SampleClass2";
    }
}

$class1 = new SampleClass1;
$class1->thisClass();
echo $class1->getText('Samurai_') .'<br>';

$class2 = new SampleClass2;
$class2->thisClass();
echo $class2->getText('Engineer_') .'<br>';

//SampleClass1
//Samurai_SampleClass1
//SampleClass2
//Engineer_SampleClass2


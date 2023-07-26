<?php
//コンストラクタとはクラスからインスタンスを生成するときに、最初に呼び出される関数のことを言います。コンストラクタは__construct()で定義し、newでインスタンスを生成すると必ず実行されます。
class Sample2Class
{
    protected $text;

    //コンストラクタの定義
    function __construct()    {
        $this->text = 'Samurai Engineer';
    }

    //メソッドの定義
    function show() {
        echo $this->text;
    }
}

//インスタンスの生成
$class = new Sample2Class();

//メソッドの呼出し
$class->show();


//クラスのプロパティやメソッドなどのメンバを参照するには、new演算子を使用して、クラスのインスタンスを生成する必要があります。
//しかし、クラス内でstaticを指定すれば、そのクラスのメンバはインスタンスを生成しなくても、参照することが可能です。
class Foo {

    //静的変数を作成する
    public static $val = 10;
}

//静的変数を参照する
$value = Foo::$val;
echo $value;

//クラス内で定数を指定するには、constを使用します。constを指定した定数をクラス内部で定義するときにはconstの後に定数名と値を指定します。
class ConstClass
{
    //定数を定義する
    const CONSTNUM1 = 100;
    const CONSTNUM2 = 200;

    function showConst(){
        echo self::CONSTNUM1.'<br>';
        echo self::CONSTNUM2;
    }
}

$Class = new ConstClass();
$Class->showConst();
//100
//200

//オブジェクト インターフェイスを使うと、 メソッドの実装を定義せずに、 クラスが実装する必要があるメソッドを指定するコードを作成できます。 インターフェイス は クラス や トレイト と名前空間を共有するので、 それらと同じ名前を使ってはいけません。
interface A
{
    public function foo();
}

interface B extends A
{
    public function baz(Baz $baz);
}

// これは動作します。
class C implements B
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}

// これは動作せず、fatal error となります。
class D implements B
{
    public function foo()
    {
    }

    public function baz(Foo $foo)
    {
    }
}
//interface はclassとは違い
//オブジェクトを受け取る側が、渡し手に対して制約を課す という色彩が強く、interface を使わされる側 になることはあっても、interface を要求する側 になる機会は、圧倒的に少ないのです。
<?php
//Throwableはすべての例外の基底クラスで、PHP7から新しくできました。
//ただし、Throwable をtry-catchでキャッチしないほうがよいでしょう。
//構文エラーやロジックのエラーなど、本来コード修正をするべきエラーだからです。
//Throwable をキャッチするのは、問題を先延ばしにしているようなものです。

// この記事を引用（https://zenn.dev/miya_tech/articles/87e93e3916b8c5）
//throwableはポケモン例外処理である。
class SampleException extends Exception {}

function divideNumbers($dividend, $divisor) {
    if ($divisor === 0) {
        throw new SampleException("Division by zero is not allowed.");
    }

    return $dividend / $divisor;
}
try {
    $result = divideNumbers(10, 0);
    echo "Result: " . $result;
} catch (SampleException $e) {
    echo "Caught DivisionByZeroException: " . $e->getMessage();
} catch (Throwable $e) {
    echo "Caught Throwable: " . $e->getMessage();
}
//divideNumbers(10, 0) によって DivisionByZeroException がスローします。
//その結果、catch (DivisionByZeroException $e) のブロックが実行され、例外の内容が表示されるはずです。
//もし DivisionByZeroException 以外の例外がスローされた場合は、catch (Throwable $e) のブロックが実行され、その例外の内容が表示されることになります。


class MyClass {
    private $property;
    private $error;
    private $jsonFile;
    // Setterメソッド
    public function setProperty(int $value) {
        $this->property = $value;
    }

    // Getterメソッド
    public function getProperty() :int{
        return $this->property;
    }
    public function setCustomValue($value)
    {
        $this->property = $value;
    }


    public function setCustomError(string $value)
    {
        $this->error = $value;
    }


    public function getCustomError() :string
    {
        return $this->error;
    }

    public function setjsonFile(string $value)
    {
        $this->jsonFile = $value;
    }


    public function getjsonFile() :string
    {
        return $this->jsonFile;
    }

}
class NullException extends Exception {
    // 任意の追加のプロパティやメソッドを定義
    // 例: エラーコード、エラーの詳細メッセージ、特定のデータなど

    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    // カスタムなメソッドを定義
    public function intMethod() {
        return 0;
    }
}
$object = new MyClass();

try {

    $object-> setProperty(1);
    $value =$object->getCustomValue();
    if ($value !== 0 ) {
        throw new \Exception("値が０ではありません。");
    }
    if ($value == null ) {
        throw new \NullException();
    }
    $object-> setjsonFile(1);
    $json =$object->getjsonFile();
    $jsonData = jsonDecode($json);
} catch (Exception $e) {
    echo $e;
    $object->setCustomError($e);

    // 例外を再スローする
    $object-> setProperty(0);
    throw $e;
}catch (Throwable $e) {
    // すべての例外（Error や Exception）をキャッチする
    echo "Caught Throwable: " . $e->getMessage() . PHP_EOL;
} catch (NullException $e) {
    echo "値がNullです。" ;
    //独自Exceptionで何かの処理をする場合。
    $value = $e->intMethod();
}finally {
    echo "jsonDecode finished";
}




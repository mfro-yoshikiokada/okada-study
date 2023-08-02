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


$jsonFile = "";
try {

    $jsonData = jsonDecode($jsonFile);

} catch (Throwable $e) {
    // すべての例外（Error や Exception）をキャッチする
    echo "Caught Throwable: " . $e->getMessage() . PHP_EOL;
} finally {
    echo "jsonDecode finished";
}

try {
    $a="b";
    if ($a!=="a") {
        throw new \Exception("値が間違っています。");
    }

} catch (Exception $e) {
    echo $e ;
} finally {
    echo "Exception data finished";
}


class MyClass {
    private $property;
    private $error;

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
}
$object = new MyClass();
try {

    $object-> setProperty(1);
    $value =$object->getCustomValue();
    if ($value !== 0 ) {
        throw new \Exception("値が０ではありません。");
    }
} catch (Exception $e) {
    echo $e;
    $object->setCustomError($e);

    // 例外を再スローする
    $object-> setProperty(0);
    throw $e;
}


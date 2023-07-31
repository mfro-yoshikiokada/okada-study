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

<?php

try {
    $result = 10 / 0;
} catch (Exception $e) {
    echo "エラーが発生しました\n";
    echo $e->getMessage();
}



try {
    $fruits = ['apple', 'grape', 'banana', 'lemon'];

    foreach ($fruits as $fruit) {
        if ($fruit === 'lemon') {
            throw new \Exception("レモンはすっぱい！");
        }

        echo $fruit."\n";
    }
} catch (Exception $e) {
    echo $e->getMessage()."\n";
}

try {
    echo "hello!!";
} catch(Exception $e) {
    echo "error!!";
} finally {
    echo "world!!";
}

//項目	内容
//try	例外処理の対象にしたい処理ブロックの先頭に書く。例外が発生しない場合には、tryを通って後続処理へ。
//例外が発生した場合にはcatchブロックに処理が移る。
//catch	tryブロックの中に書いた処理で、例外が発生した場合にcatchブロック配下の処理が行われる。
//throw	throwキーワードを使うと、tryブロックの処理の任意の箇所で、例外を発生させることができる。
//finally	finallyキーワードを使うと、tryブロックまたはcatchブロックの処理の後で、必ず実行される処理を書くことができる。
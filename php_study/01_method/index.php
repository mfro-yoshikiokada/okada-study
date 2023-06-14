<?php
function hoge(int $num) : string{
    $res = "";
    for ($i = 1; $i <= $num; $i++) {
        $res .= "hoge";
    }
    return $res;
}
echo hoge(3);

function foo()
{
    function bar()
    {
        echo "はいめっけ";
    }
}
function echoPush($str) {
    echo $str ;
}

/* ここでは関数bar()はまだ定義されていないので
   コールすることはできません。 */

foo();

echoPush("だるまさんが");
echoPush("転んだ");


/* foo()の実行によって bar()が
   定義されるためここではbar()を
   コールすることができます。*/

bar();
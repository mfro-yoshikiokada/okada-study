<?php

$fruits = ['りんご', 'オレンジ', 'メロン', 'りんご', 'パイナップル'];

$replace = str_replace('りんご', 'ばなな', $fruits, $count);

print_r($replace);

echo '置換した回数: '.$count;

/*
 *
 * Array
(
    [0] => ばなな
    [1] => オレンジ
    [2] => メロン
    [3] => ばなな
    [4] => パイナップル
)
置換した回数: 2
 */

$str = 'This year is 2016 years.';

//部分文字列を検索して置換する
$result = strtr($str, '2016', '2017');

echo $result;

$text = 'apple100 banana150';

$pattern = ['/[0-9]{3}/'];
$replace = ['', 'apple is red. ', 'banana is yellow.'];
$result = preg_replace($pattern, $replace, $text);
echo $result; // apple banana

//配列の場合
$texts = ['apple100 banana150', 'apple apple apple', '700円のビール, 100円のapple'];
$pattern = ['/[0-9]{3}/', '/apple/', '/banana/'];
$replace = ['', 'apple is red. ', 'banana is yellow.'];

$result = preg_replace($pattern, $replace, $texts);
var_dump($result);

//置換対応の配列を使って変換する
$text = 'apple banana orange grape';
$trans = ['apple' => 'red', 'banana' => 'yellow', 'e' => "e!!"];
echo strtr($text, $trans); // red yellow orange!! grape!!
<?php
$yes = array('this', 'is', 'an array');

echo is_array($yes) ? 'Array' : 'not an Array';
echo "\n";

$no = 'this is a string';

echo is_array($no) ? 'Array' : 'not an Array';
//Array
//not an Array
echo("<br>");
function cube($n)
{
    return ($n * $n * $n);
}

$a = [1, 2, 3, 4, 5];
$b = array_map('cube', $a);
print_r($b);
echo("<br>");
//Array
//(
//    [0] => 1
//    [1] => 8
//    [2] => 27
//    [3] => 64
//    [4] => 125
//)

$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$result = array_unique($input);
print_r($result);
echo("<br>");
//Array
//(
//    [a] => green
//    [0] => red
//    [1] => blue
//)

//sort昇順に並び替え
$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}
//fruits[0] = apple
//fruits[1] = banana
//fruits[2] = lemon
//fruits[3] = orange

$fruits = array(
    "Orange1", "orange2", "Orange3", "orange20"
);
sort($fruits, SORT_NATURAL | SORT_FLAG_CASE);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}

//fruits[0] = Orange1
//fruits[1] = orange2
//fruits[2] = Orange3
//fruits[3] = orange20

$fruits = array("lemon", "orange", "banana", "apple");
rsort($fruits);
foreach ($fruits as $key => $val) {
    echo "$key = $val\n";
}
//0 = orange
//1 = lemon
//2 = banana
//3 = apple

$array = array('赤' => 'red', '青' => 'blue', '黄' => 'yellow', '緑' => 'green', '紫' => 'purple');

$sort = asort($array);

print_r($sort);
echo "<br>";
print_r($array);
//Array ( [青] => blue [緑] => green [紫] => purple [赤] => red [黄] => yellow )



$array = array('赤' => 'red', '青' => 'blue', '黄' => 'yellow', '緑' => 'green', '紫' => 'purple');

$sort = arsort($array);

print_r($sort);
echo "<br>";
print_r($array);
//Array ( [黄] => yellow [赤] => red [紫] => purple [緑] => green [青] => blue )

/*
 * compactがなぜ必要なのか
 * 他の人がコードを読んだときを考えてみます。
$user[‘name’]と$nameという変数名だと、$user[‘name’]の方が「ユーザの名前」という意味を推測しやすいです。
タイプミスを減らすことができます。
 */
$name = 'hoge';
$email = 'hoge@hoge.com';
$address = 'hoge city';

$user = compact('name', 'email', 'address');
print_r($user);

// 出力結果↓
//Array
//(
//    [name] => hoge
//    [email] => hoge@hoge.com
//[address] => hoge city
//)
//

$fruits = ['apple', 'orange', 'melon', 'banana', 'pineapple'];

//配列の長さを調べる
$array_count = count($fruits);

echo 'count : '.$array_count;
//count : 5
$fruits = ['apple', 'orange', 'melon', 'banana', 'pineapple'];
//こんなふうにもつかえる
for ($i = 0 ; $i < count($fruits); $i++){
    echo $fruits[$i];
    echo '<br>';
}
//in_arrayを使うときは黙って第三引数を付けること
//参考サイト（https://qiita.com/ritukiii/items/3a6add378ae089ab5d70）
$students = ['山本', '山下', '山田'];

var_dump(in_array('山田', $students)); // trueを返すはず
var_dump(in_array('山原', $students)); // falseを返すはず
//bool(true)
//bool(false)
$numbers = [0, 1, 2, 3, 4, 5];

var_dump(in_array(3,      $numbers)); // trueを返すはず
var_dump(in_array('山原', $numbers)); // falseを返すはず
//bool(true)
//bool(true)

/*
 * なぜこうなるのか
 * 第三引数のstrictはデフォルトでfalseになっているため、型比較までしない。
  つまり、==で比較してる
 */

var_dump('山原' == 0);
var_dump('山原' === 0);

//bool(true)
//bool(false)

//じゃあどうすればよいのか
$numbers = [0, 1, 2, 3, 4, 5];

var_dump(in_array(3,      $numbers, true)); // true
var_dump(in_array('山原', $numbers, true)); // false
//配列内に値があるかどうかだけを知りたいならin_array()で十分です。
//
//ただ、検索した値のキーを取得したい場合は、検索した値のキーを取得するarray_search()が利用できます。
$aryHoge = ['Japan', 'USA', 'China'];

$key = array_search('USA', $aryHoge);

echo 'USAのキーは'.$key;
//USAのキーは1
$value_array = ['A'=>100, 'B'=>200, 'C'=>300, 'D'=>400, 'E'=>500];

//array_keysで配列のキーを取得する
$value_key = array_keys($value_array);

var_dump($value_key);


$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack);
//Array
//(
//    [0] => banana
//    [1] => apple
//    [2] => raspberry
//)

$queue = [
    "orange",
    "banana"
];

array_unshift($queue, "apple", "raspberry");
var_dump($queue);
//array(4) {
//  [0] =>
//  string(5) "apple"
//  [1] =>
//  string(9) "raspberry"
//  [2] =>
//  string(6) "orange"
//  [3] =>
//  string(6) "banana"
//}

$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);
//Array
//(
//    [0] => orange
//    [1] => banana
//    [2] => apple
//)

$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);
//Array
//(
//    [0] => orange
//    [1] => banana
//    [2] => apple
//    [3] => raspberry
//)

$value_array = ['A'=>100, 'B'=>200, 'C'=>300, 'D'=>400, 'E'=>500];

//array_keysで配列のキーを取得する
$value_key = array_keys($value_array);

var_dump($value_key);


//array_key_exists は指定したキー名が存在するか検索する。
$fruits =
    [
        'apple'=>'100円',
        'orange'=>'80円',
        'pineapple'=>'300円'
    ];

//検索するキー
$fruits_key = 'orange';

//array_key_existsで配列のキーを検索する
if (array_key_exists($fruits_key, $fruits)){
    echo $fruits_key.'は存在します';
}else{
    echo $fruits_key.'は存在しません';
}

$input = array(4, "4", "3", 4, 3, "3");
$result = array_unique($input);
var_dump($result);
//array(2) {
//  [0] => int(4)
//  [2] => string(1) "3"


$ary = array();
if (empty($ary)) {
    echo "配列は空<br />";
} else {
    echo "配列は空ではない<br />";
}

//配列は空



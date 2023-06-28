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

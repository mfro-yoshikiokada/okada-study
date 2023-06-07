
<?php

// trim()
$text  = "\t\tThese are a few words :) ...  ";
$hello  = "Hello World";

echo("<br>");

$trimmed = trim($text);
echo("<br>");
var_dump($trimmed);
echo("<br>");
$trimmed = trim($text, " \t.");
var_dump($trimmed);
echo("<br>");
$trimmed = trim($hello, "Hdle");
var_dump($trimmed);
echo("<br>");
$trimmed = trim($hello, 'HdWr');
var_dump($trimmed);
echo("<br>");

//str_replace()
$text = 'apple,orange,apple,orange';
echo("<br>");
echo $text;

$replace = str_replace('apple', 'melon', $text);

echo "'$text'のappleをメロンに入れ替えた。'$replace'";

echo("<br>");

//strstr()
$email  = 'name@example.com';
echo("<br>");
echo $email;
echo("<br>");

$domain = strstr($email, '@');
echo $domain;
echo("<br>");

$user = strstr($email, '@', true);
echo $user;
echo("<br>");

//strpos()
$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);
echo("<br>");
echo "'$findme'は文字列'$mystring'の'$pos'番目です。";
echo("<br>");

//explode
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
echo("<br>");
echo $pizza;
echo("<br>");
$pieces = explode(" ", $pizza);
echo $pieces[0];
echo("<br>");
echo $pieces[1];
echo("<br>");

//implode
$array = ['lastname', 'email', 'phone'];

echo("<br>");
var_dump($array);
echo("<br>");

var_dump(implode(",", $array));
echo("<br>");
//empty isset
$var = 0;
echo("<br>");
if (empty($var)) {
    echo '$var が空なのでtrueと出力されます';
}
echo("<br>");

if (isset($var)) {
    echo '$var が設定されているのでtrueと出力されます';
}
//intval
echo intval(42);                      // 42
echo("<br>");
echo intval(4.2);                     // 4
echo("<br>");
echo intval('42');                    // 42
echo("<br>");
echo intval('+42');                   // 42
echo("<br>");
echo intval('-42');                   // -42
echo("<br>");
echo intval(042);                     // 34
echo("<br>");
echo intval('042');                   // 42
echo("<br>");
//is_numeric
$tests = [
    " 42",
    "42 ",
    "\u{A0}9001", // non-breaking space
    "9001\u{A0}", // non-breaking space
];

foreach ($tests as $element) {
    if (is_numeric($element)) {
        echo("<br>");
        echo var_export($element, true) . " じゃ数字です", PHP_EOL;
    } else {
        echo("<br>");
        echo var_export($element, true) . " は数字じゃありません", PHP_EOL;
    }
}

//is_array
echo("<br>");
$yes = array('this', 'is', 'an array');
echo("<br>");
echo is_array($yes) ? 'Array' : 'not an Array';
echo("<br>");

$no = 'this is a string';

echo is_array($no) ? 'Array' : 'not an Array';
echo("<br>");

//unset
function destroy_foo()
{
    global $foo;
    unset($foo);
}

$foo = 'bar';
echo("<br>");
echo $foo;
echo("<br>");
destroy_foo();
echo $foo;
echo("<br>");
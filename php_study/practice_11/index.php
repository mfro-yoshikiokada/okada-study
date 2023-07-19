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
//<h1>を<h2>におきかえ
$subject = '<h1>私はリンゴが好きです</h1>';
$search = '/<h1>(.*?)<\/h1>/';
$replace = '<h2>$1</h2>';
$subject = preg_replace($search, $replace, $subject);
echo $subject;

//グループ化を使用しidとclassを逆にする
$subject = '<h1 id="h1-id" class="h1-class">これはh1タグの中の文字列です</h1>';
$search = '/<h1 id="(.*?)" class="(.*?)">(.*?)<\/h1>/';
$replace = '<h1 id="$2" class="$1">$3</h1>';
$subject = str_replace($search, $replace, $subject);
echo $subject;
//実行結果：<h1 id="h1-class" class="h1-id">これはh1タグの中の文字列です</h1>

//放送禁止用語の削除 1
$forbiddenWords = array("fucking", "fuck", "shit","bitch");
$message = "It’s fucking boring.Eat shit and die.";

$filteredMessage = str_replace($forbiddenWords, "****", $message);

echo "Filtered Message: " . $filteredMessage . "\n";
//URL文字をリンクにする 2
$val = '当サイトのURLは https://nagablog.info/ です。';
$urlPattern = '/https?(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)/';
echo preg_replace($urlPattern, '<a href="\\0">\\0</a>', $val);

// 改行コードをbrタグへ置換 3
$val = 'バナナは南国の食べ物です。
色は黄色で美味しいです。';
echo preg_replace('/\n/', '<br>', $val);
//ファイルの名前を置き換え 4
$filePath = "/path/to/file.txt";

$pattern = '/(.*)\/([^\/]+)\.\w+$/';
$replacement = '$2';

$newFilePath = preg_replace($pattern, $replacement, $filePath);

echo "New File Path: " . $newFilePath . "\n";


//5 複数対象を置換する
$text = 'apple100 banana150';

$pattern = ['/[0-9]{3}/', '/apple/', '/banana/'];
$replace = ['', 'apple is red. ', 'banana is yellow.'];
$result = preg_replace($pattern, $replace, $text);
echo $result; // apple is red.  banana is yellow.
echo("<br>");
$str = 'ABCDEFGHIJKL1234567';
//アルファベットA-Zを全て'Z'に置き換える 6
$str_grep = mb_ereg_replace('[A-Z]', 'Z', $str);

echo $str_grep;
//配列の場合 7
$texts = ['apple100 banana150', 'apple apple apple', '700円のビール, 100円のapple'];
$pattern = ['/[0-9]{3}/', '/apple/', '/banana/'];
$replace = ['', 'apple is red. ', 'banana is yellow.'];

$result = preg_replace($pattern, $replace, $texts);
var_dump($result);

//置換対応の配列を使って変換する 8
$text = 'apple banana orange grape';
$trans = ['apple' => 'red', 'banana' => 'yellow', 'e' => "e!!"];
echo strtr($text, $trans); // red yellow orange!! grape!!
echo("<br>");

// CSVデータ
$csvData = 'John,Doe,JohnDoe@example.com
Jane,Smith,JaneSmith@example.com
Alex,Johnson,AlexJohnson@example.com';

var_dump($csvData);
echo("<br>");
// 改行文字をカンマに置換してCSVデータを整形 1
$csvData = preg_replace("/(\r\n|\n|\r)/", ",", $csvData);
var_dump($csvData);
echo("<br>");


//URLのパラメータを書き換える 2
$url = "https://www.xxxx.com/?word=dryer";
$change = "/?word=change";
echo("<br>");

//メアドの@以降を取っ払う 3
$email = "example@example.com";
$maskedEmail = preg_replace("/@.*/", "", $email);
echo "置き換え後のメールアドレス: $maskedEmail\n";

//CSVを文字列にして空白に置き換える 4
$csvData = 'John,Doe,JohnDoe@example.com';

$replacedData = str_replace(',', ' ', $csvData);

echo " $replacedData\n";
//htmlでpタグをstrongタグに変更　5
$html = "<p>Hello, <strong>World!</strong></p>";
$plainText = str_replace(["<p>", "</p>", "<strong>", "</strong>"], "", $html);
echo " $plainText\n";

//hellowをHi!におきかえる 6
$text = "Hello, world! How are you?";
$newText = str_replace("hello", "Hi!", $text);
echo " $newText\n";

//IPアドレスを伏せる 7
$text = "The IP address is 192.168.0.1";
$maskedText = preg_replace("/\b(\d{1,3}\.\d{1,3}\.\d{1,3})\.\d{1,3}\b/", "***.***.***", $text);
echo " $maskedText\n";


//特定の文字列の後ろの桁数を０にする 8
$string = "あいうえお12345";
$maskedText = preg_replace( "/(\d+)$/","0",  $string);
echo " $maskedText\n";
$string = "あいうえお12345";

//金額の数字のみを伏字にする 9
 $target = 'This water(100ml) is 100yen';

$maskedText = preg_replace( "/\d3(?=yen)/","xxxx",  $target);
echo " $maskedText\n";

//2桁と３桁の数字のみ取得し伏字にする。10
$target = '150 is greater than 15.';

$maskedText = preg_replace( " /\d{2,3}/","xxx",  $target);
echo " $maskedText\n";

//1と１２の繰り返す部分のみ伏字 11
$target = '1, 112, 11212, 1121212';
$maskedText = preg_replace( "/1(12)*/","xxx",  $target);
echo " $maskedText\n";

//一番目のcatのみをdogに変更 12
$target = 'cat dog cat';
$maskedText = preg_replace( "/^cat/","dog",  $target);
echo " $maskedText\n";

//JavaScript Javaを伏字にする 13
const target = 'Python JavaScript Java';
$maskedText = preg_replace( "/Java(Script)?/","xxxxxx",  $target);
echo " $maskedText\n";

// This is React, This is JavaScript をThis is the Python に変更 14
const target = 'This is React This is JavaScript';
$maskedText = preg_replace( "/This is (React|JavaScript)/","This is the Python",  $target);
echo " $maskedText\n";
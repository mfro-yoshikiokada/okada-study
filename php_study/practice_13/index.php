<?php
//implode
$array = ['lastname', 'email', 'phone'];
var_dump(implode(",", $array)); // string(20) "lastname,email,phone"

// 空の配列を使うと空文字列となります
var_dump(implode('hello', [])); // string(0) ""

// separator はオプションです。
var_dump(implode(['a', 'b', 'c'])); // string(3) "abc"


$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

//フラグ定数名	説明
//ENT_COMPAT	ダブルクオートはエスケープするが、シングルクオートはしない
//ENT_QUOTES	ダブルクオートもシングルクオートも両方エスケープする
//ENT_NOQUOTES	ダブルクオートもシングルクオートもエスケープしない
//ENT_HTML401	HTML 4.01 として処理
//ENT_HTML5	HTML 5 として処理

//XSSを防ぐため。
//テキストで入力されたものを正しくHTMLに出力するため。


$str = htmlspecialchars("<h2>データベース</h2>");

echo $str;
//クロスサイトスクリプティング(XSS)とは
//クロスサイトスクリプティングとは攻撃者が悪意のあるスクリプトを埋め込み、ユーザーに実行させる攻撃手法。この攻撃により利用者はCookieのデータや個人情報等を攻撃者に送信してしまい、意図しない操作を実行させられてしまいます！
//https://tech-lab.sios.jp/archives/21780

//「trim関数」とは、文字列の先頭と末尾から余計な空白を取り除くための関数です。


$str = "  Hello  ";

// trimで空白を除去
$trm = trim($str);

var_dump($trm);
//string(5) "Hello"

$str = 'Hello';

//削除したい文字を指定
$trm = trim($str, 'He');

var_dump($trm);
//string(3) "llo"

//preg_replace — 正規表現検索および置換を行う
$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);

//strpos — 文字列内の部分文字列が最初に現れる場所を見つける

$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

// === を使用していることに注目しましょう。単純に == を使ったのでは
// 期待通りに動作しません。なぜなら 'a' が 0 番目 (最初) の文字だからです。
if ($pos === false) {
    echo "文字列 '$findme' は、文字列 '$mystring' の中で見つかりませんでした";
} else {
    echo "文字列 '$findme' が文字列 '$mystring' の中で見つかりました";
    echo " 見つかった位置は $pos です";
}
/*
 *
 * https://qiita.com/rana_kualu/items/cb758cdc21d60e632491
 * この記事にある通り先頭の文字列がマッチすると０を返すのでfalseと認識されることもある。
 * そのためPHP8からstr_containsを使用することが好ましい。
 */
if(strpos('放課後アトリエといろ', 'アトリエ')){
    echo '"放課後アトリエといろ"には"アトリエ"が含まれる'; // 表示される
}

if(strpos('放課後アトリエといろ', '放課後')){
    echo '"放課後アトリエといろ"には"放課後"が含まれる'; // 表示されない！！
}


if(strpos('放課後アトリエといろ', '放課後') !== false ){
    echo '"放課後アトリエといろ"には"放課後"が含まれる'; // 表示される
}

// strlen — 文字列の長さを得る
$str = 'abcdef';
echo strlen($str); // 6

$str = ' ab cd ';
echo strlen($str); // 7
/*
 * 注意:
    strlen() が返すのはバイト数であり、 文字数ではありません。

 */

print_r( strlen('あいうえお') );
/// => 15

print_r( strlen('あア亜') );
/// => 12

// ひらがななどを含む場合 mb_strlen　を使用
$string1 = "入門だよ";
var_dump( mb_strlen( $string1, "UTF-8" ) );

$string2 = "PHP入門だよ";
var_dump( mb_strlen( $string2, "UTF-8" ) );
//int(4)
//int(7)


//strtoupper — 文字列を大文字にする
$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtoupper($str);
echo $str; // 「MARY HAD A LITTLE LAMB AND SHE LOVED IT SO」を出力します。

//strtolower — 文字列を小文字にする
$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtolower($str);
echo $str; // mary had a little lamb and she loved it so を返します

//substr — 文字列の一部分を返す
$rest = substr("abcdef", -1);    // "f" を返す
echo $rest;
$rest = substr("abcdef", -2);    // "ef" を返す
echo $rest;
$rest = substr("abcdef", -3, 1); // "d" を返す
echo $rest;
//また開始位置をマイナスの値で指定した場合、文字列の最後の位置から先頭に向かって何文字目かという意味になります。
$rest =substr('abcde', -2, 2) ;
echo $rest;
$rest =substr('abcde', -3) ;
echo $rest;

//文字数で指定した場合には「mb_substr」関数を使います。半角文字も全角文字も1文字は1文字として扱います。
echo mb_substr( "いろはにほ", 1, 6, "UTF-8" ) . "\n";//ろはに
echo mb_substr( "いろはにほ", 1, 6 ) . "\n";//ろはに
echo("<br>");

//mb_convert_encoding — ある文字エンコーディングの文字列を、別の文字エンコーディングに変換する
/* 内部文字エンコーディングからSJISに変換 */
$str = mb_convert_encoding($str, "SJIS");
echo $str;
echo("<br>");
/* EUC-JPからUTF-7に変換 */
$str = mb_convert_encoding($str, "UTF-7", "EUC-JP");
echo $str;
echo("<br>");
/* JIS, eucjp-win, sjis-winの順番で自動検出し、UCS-2LEに変換 */
$str = mb_convert_encoding($str, "UCS-2LE", "JIS, eucjp-win, sjis-win");
echo $str;
echo("<br>");
/* mbstring.language が "Japanese" の場合 "auto" は、"ASCII,JIS,UTF-8,EUC-JP,SJIS" に展開される */
$str = mb_convert_encoding($str, "EUC-JP", "auto");
echo $str;
echo("<br>");

//mb_split — マルチバイト文字列を正規表現により分割する
print_r( mb_split("\s", "hello world") );
//Array (
//    [0] => hello
//    [1] => world
//   )
$str = "あああ1いいい2ううう3えええ4おおお";
$arr = mb_split("[0-9]", $str);

foreach ($arr as $item) {
    echo $item."<br />";
}
//あああ
//いいい
//ううう
//えええ
//

//preg_match — 正規表現によるマッチングを行う
preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
//Array
//(
//    [0] => Array
//        (
//            [0] => foobarbaz
//            [1] => 0
//        )
//
//    [1] => Array
//        (
//            [0] => foo
//            [1] => 0
//        )
//
//    [2] => Array
//        (
//            [0] => bar
//            [1] => 3
//        )
//
//    [3] => Array
//        (
//            [0] => baz
//            [1] => 6
//        )
//
//)

//preg_replace — 正規表現検索および置換を行う
$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
//April1,2003

//preg_quote — 正規表現文字をクオートする

$str = '-._~%:/?#[]@!$&\'()*+,;=';
$str = preg_quote( $str , '/');
echo $str;// \-\._~%\:\/\?#\[\]@\!\$&'\(\)\*\+,;\=

//number_format — 数字を千の位毎にグループ化してフォーマットする
$money = 1000000;
echo number_format($money); //1,000,000

$money = 1000000;
echo number_format($money,1, ',', '.');//1.000.000,0

//sprintf — フォーマットされた文字列を返す
//指定子	説明
//%	文字通り、パーセント文字です。 引数は不要です。
//b	引数は整数として扱われ、バイナリ値として表現されます。
//c	引数は整数として扱われ、ASCII文字として表現されます。
//d	引数は整数として扱われ、(符号付き)10進数値として表現されます。
//e	引数は科学的記法で表現された値(e.g. 1.2e+2)として扱われます。
//E	e 指定子に似ていますが、 大文字を使います(e.g. 1.2E+2)
//f	引数は小数として扱われ、浮動小数点数値として表現されます(ロケールを考慮します)。
//F	引数は小数として扱われ、浮動小数点数値として表現されます(ロケールを考慮しません)。
//g 汎用フォーマット
//
//  P を精度を表す、ゼロでない値とします。 精度が省略された場合、Pの値は6です。 精度に0を指定した場合、Pの値は1になります。 この場合、 E 指定子の変換結果は、 X乗になります。
//
//  P > X ≥ −4 の場合、E 指定子の変換結果となり、精度は、P − (X + 1) になります。 そうでない場合、e 指定子の変換結果となり、 精度は、P - 1 になります。
//
//G	g 指定子に似ていますが、 E と f を使います。
//h	g 指定子に似ていますが、 F を使います。 PHP 8.0.0 以降で利用可能です。
//H	g 指定子に似ていますが、 E と F を使います。 PHP 8.0.0 以降で利用可能です。
//o	引数は整数として扱われ、8進数値として表現されます。
//s	引数は文字列として扱われ、文字列として表現されます。
//u	引数は整数として扱われ、符号なし10進数値として表現されます。
//x	引数は整数として扱われ、16進数値(小文字)として表現されます。
//X	引数は整数として扱われ、16進数値(大文字)として表現されます。
$num = 5;
$location = 'tree';

$format = 'There are %d monkeys in the %s';
echo sprintf($format, $num, $location);//There are 5 monkeys in the tree


//ceil — 端数の切り上げ
echo ceil(4.3);    // 5
echo ceil(9.999);  // 10
echo ceil(-3.14);  // -3

//floor — 端数の切り捨て
echo floor(4.3);   // 4
echo floor(9.999); // 9
echo floor(-3.14); // -4

//round — 浮動小数点数を丸める
var_dump(round(3.4));
var_dump(round(3.5));
var_dump(round(3.6));
//float(3)
//float(4)
//float(4)

$number = 135.79;

var_dump(round($number, 3));
var_dump(round($number, 2));
var_dump(round($number, 1));
var_dump(round($number, 0));
var_dump(round($number, -1));
var_dump(round($number, -2));
var_dump(round($number, -3));

//float(135.79)
//float(135.79)
//float(135.8)
//float(136)
//float(140)
//float(100)
//float(0)
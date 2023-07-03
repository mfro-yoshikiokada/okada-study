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

//str_replace 置換のときに利用したのでとばします。


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

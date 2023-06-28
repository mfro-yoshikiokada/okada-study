<?php


$str = "ikura@yahoo.co.jp";
if (preg_match('/ikura@yahoo.co.jp/', $str)) {
    echo "マッチします。メールアドレスは" . $str . "です。";
} else {
    echo "マッチしません。";
}
$password = "MyP@ssw0rd!";
$pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/';

if (preg_match($pattern, $password)) {
    echo "Strong password!";
} else {
    echo "Weak password.";
}

$html = '<div class="container">
            <h1>Title</h1>
            <p>Paragraph</p>
        </div>';

$pattern = '/<(\w+)(\s+[^>]*)?>.*?<\/\1>/s';

preg_match_all($pattern, $html, $matches);

$elements = $matches[0];
var_dump($matches);

foreach ($elements as $element) {
    echo $element . "<br>";
}

$creditCardNumber = "1234-5678-9012-3456";
$pattern = '/\b\d{4}[- ]?\d{4}[- ]?\d{4}[- ]?\d{4}\b/';

if (preg_match($pattern, $creditCardNumber)) {
    echo "Valid credit card number!";
} else {
    echo "Invalid credit card number.";
}
$date = "26/06/2023";
$pattern = '/^\d{2}\/\d{2}\/\d{4}$/';

if (preg_match($pattern, $date)) {
    echo "Valid date!";
} else {
    echo "Invalid date.";
}
//最低でもひとつ大文字、ひとつ小文字、ひとつ数値を含むパスワード
$password = "MyP@ssw0rd";
$pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/';

if (preg_match($pattern, $password)) {
    echo "Valid password!";
} else {
    echo "Invalid password.";
}


preg_match('/@(.+)/', $str, $matches);
$domain = $matches[1];
var_dump($matches);

$replace = preg_replace('/@(.+)/', '@Mfro.net', $str);
echo $replace;
//$replace = ikura@Mfro.net
if (preg_match('/mfro/i', $replace)) {
    echo "大文字でもヒットします。";
} else {
    echo "ヒットしません。";
}
//iオプション
/** パターン */
$pattern = '/hoge/i';
/** 置換対象の文字列 */
$subject = 'hoge HOge HOGE';
/** 置換を行う文字列 */
$replacement = 'PIYO';

$subject = preg_replace( $pattern, $replacement, $subject );
print_r( $subject );
//PIYO PIYO PIYO
//グループ化
$subject = "Hello, 12345 World!";
$pattern = '/(Hello), (\d+) (World)!/';
preg_match($pattern, $subject, $matches);
var_dump($matches);
//array(4) {
// [0]=> string(19) "Hello, 12345 World!"
// [1]=> string(5) "Hello"
// [2]=> string(5) "12345"
// [3]=> string(5) "World"
// }

$phoneNumber = "+1-123-456-7890";
$pattern = '/^\+(\d+)-(\d+)-(\d+)-(\d+)$/';

preg_match($pattern, $phoneNumber, $matches);
var_dump($matches);
//array(5) { [0]=> string(15) "+1-123-456-7890"
// [1]=> string(1) "1"
// [2]=> string(3) "123"
// [3]=> string(3) "456"
// [4]=> string(4) "7890"
// }
// 正規表現パターンを定義します
$pattern = '/^[a-z]{3}\d{3}$/';

// テスト用の文字列を作成します
$string1 = 'abc123';
$string2 = 'xyz456';
$string3 = 'def789';

// マッチングを実行します
function match(string $pattern, string $string)
{
    if (preg_match($pattern, $string)) {
        echo "マッチしました: $string\n";
    } else {
        echo "マッチしませんでした: $string\n";
    }
}

match($pattern, $string1);

$str = '123456789';
$regex = '/(...)(...)(...)/'; //3文字ずつ3グループ化する
preg_match($regex, $str, $matches); //マッチしたグループ配列が$matchesに格納される
print_r($matches);

/*
 * Array
(
    [0] => 123456789 ←マッチした全文字列
    [1] => 123            ←1番目の3文字
    [2] => 456            ←2番目の3文字
    [3] => 789            ←3番目の3文字
)
 */
//パスワードが半角英数字のみで入力されているか
$password = "Password123";
$pattern = "/^[0-9A-Za-z]+$/";

$result = preg_match($pattern, $password);
if ($result) {
    echo "パスワードは半角英数字です。";
}
//郵便番号のみで入力されているか
$postCode = "151-0064";
$pattern = "/^\d{3}-\d{4}$/";

$result = preg_match($pattern, $postCode);
if ($result) {
    echo "郵便番号です。";
}
//電話番号のみで入力されているか
$phoneNumber = "080-0000-0000";
$pattern = "/^\d{3}-\d{4}-\d{4}$/";

$result = preg_match($pattern, $phoneNumber);
if ($result) {
    echo "電話番号です。";
}

//preg_match_all
$string = "Aさんの郵便番号は192-0043、Bさんの郵便番号は162-2235です。";
if (preg_match_all("/([0-9]{3})-([0-9]{4})/", $string, $data, PREG_SET_ORDER)) {
    echo "マッチしました。";
}else {
    echo "マッチしていません。";
}

print_r($data);
//マッチしました。
//
//Array (
//
//　[0] => Array (
//
//　　[0] => 192-0043 [1] => 192 [2] => 0043 )
//
//　[1] => Array (
//
//　　[0] => 162-2235 [1] => 162 [2] => 2235 )
//
//)
/*
 * パターン \r\n は改行文字を表し、[\r\n]+ は1回以上の改行文字の連続を表します。したがって、Hello, の後に改行文字が続き、最後に World が続く行がマッチします。
 */
$text = "Hello,\r\nWorld!";
$pattern = '/Hello,[\r\n]+World/';

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}

$text = "Hello,\tWorld!";
$pattern = '/Hello,\tWorld/';

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}
// \t はタブ文字を表し、Hello, の後にタブ文字があり、最後に World が続くテキストがマッチします。
$text = "Hello, World!";
$pattern = '/Hello,\sWorld/';

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}
// \s は空白文字を表し、Hello, の後に空白文字があり、最後に World が続く文字列がマッチします。
$text = "Hello123World";
$pattern = '/Hello\w+World/';

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}
//\w は単語文字（英数字とアンダースコア）を表し、Hello の後に1回以上の単語文字があり、最後に World が続く文字列がマッチします。

$text = "Hello, World!";
$pattern = '/Hello\W+World/';

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}
//\W は非単語文字（英数字とアンダースコア以外）を表し、Hello の後に1回以上の非単語文字があり、最後に World が続く文字列がマッチします。
/*[ ]
 * 対象となる文字のパターンを指定する
 * ※自分で作成する／定義済み文字クラスの使用 の2種類がある
 */
if (preg_match('/d[aiueo]g/', 'word dzg word dog word')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
/*
 *
[0-9]		0 ～ 9 の何れかで、[0123456789]と同じ意
※- （ハイフン）は文字クラス内で範囲を指定する
PHPサンプルコードPHP
 *
 */

if (preg_match('/[0-9]/', 'abc1def')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//結果：一致

/*
[a-z]		小文字 a ～ z の何れかで、[abcdefghijklmnopqrstuvwxyz]と同じ意
※- （ハイフン）は文字クラス内で範囲を指定する
PHPサンプルコードPHP
 */

if (preg_match('/[a-z]/', '123g456')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//結果：一致


/*
[A - Z]		大文字 A ～ Z の何れか
※ - （ハイフン）は文字クラス内で範囲を指定する
PHPサンプルコードPHP
*/
if (preg_match('/[A-Z]/', '123G456')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//結果：一致

/*
[a - zA - Z0 - 9]		アルファベットか数字の何れか
※ - （ハイフン）は文字クラス内で範囲を指定する
PHPサンプルコードPHP
*/
if (preg_match('/[a-zA-Z0-9]/', 'あいうえおaかきくけこ')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
if (preg_match('/[a-zA-Z0-9]/', 'あいうえおBかきくけこ')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
if (preg_match('/[a-zA-Z0-9]/', 'あいうえお3かきくけこ')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//結果：一致 一致 一致

/*
 *
[ぁ - んー]		ひらがな の何れか
※ - （ハイフン）は文字クラス内で範囲を指定する
※日本語を扱う場合 修飾子 u を指定
PHPサンプルコードPHP
*/
if (preg_match('/[^ぁ-んー]/u', 'あいうえおカきくけこ'))
    echo 'ひらがな でない'; else echo 'すべて ひらがな';
//結果：ひらがな でない

/*
[ァ - ヶー]		カタカナ の何れか
※ - （ハイフン）は文字クラス内で範囲を指定する
※日本語を扱う場合 修飾子 u を指定
PHPサンプルコードPHP
*/

if (preg_match('/[^ァ-ヶー]/u', 'アイウエオカキクケコ'))
    echo 'カタカナ でない'; else echo 'すべて カタカナ';
//結果：すべて カタカナ

/*
[一 - 龠]		漢字 の何れか
※ - （ハイフン）は文字クラス内で範囲を指定する
※日本語を扱う場合 修飾子 u を指定
PHPサンプルコードPHP

*/
if (preg_match('/[^一-龠]/u', '亜井宇江尾化木区毛子'))
    echo '漢字 でない'; else echo 'すべて 漢字';
//結果：すべて 漢字

/*
[!#<>:;&~@%+$"\'\*\^\(\)\[\]\|\/\.,_-]		指定記号 の何れか
    ※ - （ハイフン）は文字クラス内で範囲を指定する
PHPサンプルコードPHP

*/
if (preg_match('/[^!#<>:;&~@%+$"\'\*\^\(\)\[\]\|\/\.,_-]/', '_+-.,!@#$%^&*();/|<>"\''))
    echo '指定記号 でない'; else echo 'すべて 指定記号';
//結果：すべて 指定記号
/*
?	クエッション	0回または1回の出現
PHPサンプルコードPHP

*/
if(preg_match('/boa?t/', 'boat')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*
*	アスタリスク	0回以上の繰り返し出現
PHPサンプルコードPHP

*/
if(preg_match('/boa*t/', 'bot')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*
+	プラス	1回以上の繰り返し出現
PHPサンプルコードPHP
*/
if(preg_match('/boa+t/', 'boaaaaaaaaaat')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*
{n}	波括弧	n回の繰り返し出現
PHPサンプルコードPHP
*/

if(preg_match('/boa{3}t/', 'boaaat')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致

/*{n,}	波括弧	n回以上 の繰り返し出現
PHPサンプルコードPHP

*/
if(preg_match('/boa{5,}t/', 'boaaaat')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//不一致

/*{n,m}	波括弧	n回以上 – m回以下 の繰り返し出現
PHPサンプルコードPHP

*/
if(preg_match('/boa{1,3}t/', 'boaaaat')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//不一致


/*\	バックスラッシュ	直後の特殊文字（＝メタ文字）を普通の文字として扱う（＝エスケープする）
PHPサンプルコードPHP
 */
if(preg_match('/1\.0/', '1.0')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*^	キャレット	文字列の先頭、この特殊文字の次に指定された文字列で始まっていれば という意
※文字クラスで使用すると否定の意
PHPサンプルコードPHP

*/
if(preg_match('/^This/', 'This is a pen')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*$	ドル	この特殊文字の前に指定された文字列で終っていれば という意
※文字クラスで使用すると通常の文字の意
PHPサンプルコードPHP
 */
if(preg_match('/a pen$/', 'This is a pen')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*.	ドット	任意の1文字を表す【\n (改行)以外】
※文字クラスで使用すると通常の文字の意
PHPサンプルコードPHP
*/
if(preg_match('/b.g/', 'bug')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*?	クエッション	0回または1回の出現
PHPサンプルコードPHP
*/
echo preg_match('/boa?t/', 'boat');
//1
/* *	アクタリスク	0回以上の繰り返し出現
PHPサンプルコードPHP
 */
echo preg_match('/boa*t/', 'bot');
//1
/*+	プラス	1回以上の繰り返し出現
PHPサンプルコードPHP
 */
echo preg_match('/boa+t/', 'boaaaaaaaaaat');
//1
/* |	パイプ	選択肢の作成。ORの意
PHPサンプルコードPHP
 */
if(preg_match('/11|12/', '9 10 11')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致

/* ^	キャレット	文字クラスの否定の意。クラスの先頭に ^（キャレット）を配置
PHPサンプルコードPHP
 */
if(preg_match('/d[^aiueo]g/', 'word deg word dog word')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//不一致
/* $	ドル	[ ] の文字クラス内部では通常の記号となる
PHPサンプルコードPHP
 */
if(preg_match('/[$]/', '100$')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/* .	ピリオド	[ ] の文字クラス内部では通常の記号となる
PHPサンプルコードPHP
 */
if(preg_match('/[.]/', 'This is a pen.')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/* –	ハイフン	文字列の範囲を指定
PHPサンプルコードPHP
 */
if(preg_match('/[0-9]/', 'abc1def')) echo "一致<br/>\n"; else echo "不一致<br/>\n";
//結果：一致

/* ( )	小括弧	サブパターン（単位）を作る。1つの単位として扱うことができる。
PHPサンプルコードPHP
 */
if(preg_match('/( very){2}/', 'She is very very good at a song.'))
    echo "一致<br/>\n"; else echo "不一致<br/>\n";
//一致
/*
{ }	中括弧	量指定子
[ ]	大括弧	文字クラスを作る
 */
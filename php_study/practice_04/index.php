
<?php
/*
- 判定
=== → phpの場合、数値と文字列の判定は===を使う
== → 曖昧判定。また'8a' == 8 でもtrueになってしまう
>< → 文字列でも判定可能( '8' > 0)
'' → empty('')はtrue
*/
$zero = 0;
if (0===$zero) {
    echo "zero はゼロ";
}
$r = (0===$zero) ?'zero はゼロ':"";
echo $r ;
if ('8a' == 8) {
    echo "曖昧判定。また'8a' == 8 でもtrueになってしまう";
}
if ('8' > 0) {
    echo "文字列でも判定可能( '8' > 0)";
}
if (empty(1)) { //false
    echo "empty(1)はtrue";
}
if (empty('')) {
    echo "empty('')はtrue";
}
if (empty('0')) {
    echo "empty('0')はtrue";
}
if (empty(NULL)) {
    echo "empty(NULL)はtrue";
}
if (empty(0)) {
    echo "empty(0)はtrue";
}

if (empty([])) {
    echo "empty([])はtrue";
}
if (empty([ ])) {
    echo "empty([スペースあり])はtrue";
}
if (empty([　])) { //エラーが出る
    echo "empty([全角スペースあり])はtrue";
}
if (empty([1])) { //false
    echo "empty([1])はtrue";
}
//issetの場合
echo("<br>");
$a =1;
if (isset($a)) { //false
    echo "isset(1)はtrue";
}
$b='';
if (isset($b)) {
    echo "isset('')はtrue";
}
$c ='0';
if (isset($c)) {
    echo "isset('0')はtrue";
}
$d =NULL;
if (isset($b)) {
    echo "isset(NULL)はtrue";
}
$e =0;
if (isset($e)) {
    echo "isset(0)はtrue";
}
$f =[];
if (isset($f)) {
    echo "isset([])はtrue";
}
$g =[ ];
if (isset($g)) {
    echo "empty([スペースあり])はtrue";
}
$h = [　]; //エラーが出る
if (isset($h)) {
    echo "isset([全角スペースあり])はtrue";
}
$i =[1];
if (isset($i)) { //false
    echo "isset([1])はtrue";
}
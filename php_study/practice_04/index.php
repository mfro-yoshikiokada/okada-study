
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
if (empty([1])) { //false
    echo "empty([1])はtrue";
}
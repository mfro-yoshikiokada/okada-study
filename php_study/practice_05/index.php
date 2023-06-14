<?php
/*
 * ・各型タイプの変数をvar_dumpして中身を確認する

 - 参照渡し
 ・$a = &$b;
 ・function abc(&$a){ $a = 1;}などで値を変更して挙動を確認する
 → phpの場合、オブジェクトは、参照渡しにしなくても参照渡しになります。
 */
# 結果
$c =0;

function abc(&$a){ $a = 1;}
abc($c);
var_dump($c);
function passByValue () {
    $a = 2;
    $b = $a;  // 変数aを代入
    $a = 10;
    return $b;
}
var_dump(passByValue()); //結果２

function passByReference () {
    $a = 2;
    $b =& $a;  // 変数aを&をつけて代入
    $a = 10;    // 変数aの値を変更
    echo $b;

}
var_dump(passByReference()); //結果10

function passByValue2 () {
    $a = array(1, 2, 3);
    $b = $a;                  // 配列を代入
    $a[1] = 0;                // 配列aを変更
    var_dump($b);
}
var_dump(passByValue2());
//結果 array(3) {
//  [0] => int(1)
//  [1] => int(2)  // $b[1]の値は2のまま
//  [2] => int(3)
//}


function passByReference2 () {
    $a = array(1, 2, 3);
    $b =& $a;                // 配列を&をつけて代入
    $a[1] = 0;               // 配列aを変更
    var_dump($b);
}
var_dump(passByReference2());
//結果　array(3) {
//  [0] => int(1)
//  [1] => int(0)  // $b[1]の値が0に変わっている
//  [2] => int(3)
//}

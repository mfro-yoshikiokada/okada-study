<?php

  $str = "ikura@yahoo.co.jp";
if(preg_match('/ikura@yahoo.co.jp/', $str)) {
    echo "マッチします。メールアドレスは".$str."です。";
}else{
    echo "マッチしません。";
}

preg_match('/@(.+)/', $str, $matches);
$domain = $matches[1];
var_dump($matches);

$replace =preg_replace('/@(.+)/', '@Mfro.net', $str);
echo $replace;
//$replace = ikura@Mfro.net
if(preg_match('/mfro/i', $replace)) {
    echo "大文字でもヒットします。";
}else{
    echo "ヒットしません。";
}


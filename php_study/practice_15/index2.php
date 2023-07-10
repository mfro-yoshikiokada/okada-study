<?php
//セッション変数を個別に削除
//セッションスタート
session_start();

//セッション変数に登録
$_SESSION['mail'] = 'support@wepicks.net';
$_SESSION['url'] = 'https://wepicks.net/';

//セッション変数の呼び出し
echo $_SESSION['mail']."<br/>\n";
echo $_SESSION['url']."<br/>\n";

//セッション変数の削除
unset($_SESSION['mail']);

//セッション変数の呼び出し
echo $_SESSION['mail']."<br/>\n";
echo $_SESSION['url']."<br/>\n";
?>

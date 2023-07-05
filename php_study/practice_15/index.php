<?php
session_start();//セッションスタート

$_SESSION['mail'] = 'support@wepicks.net';//セッション変数に登録

echo $_SESSION['mail']."<br/>\n";//セッション変数の呼び出し

echo session_id()."<br/>\n";//セッションIDの確認

echo session_name()."<br/>\n";//セッション名の確認

echo session_unset()."<br/>\n";//セッション変数の開放

echo $_SESSION['mail']."<br/>\n";//セッション変数の呼び出し
?>
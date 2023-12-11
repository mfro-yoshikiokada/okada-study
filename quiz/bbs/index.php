<?php

// セッション管理開始
session_start();

if (!isset($_SESSION['count'])) {
    // キー'count'が登録されていなければ、1を設定
    $_SESSION['count'] = 1;
} else {
    //  キー'count'が登録されていれば、その値をインクリメント
    $_SESSION['count']++;
}

echo $_SESSION['count'] . "回目の訪問です。";
var_dump($_SESSION);

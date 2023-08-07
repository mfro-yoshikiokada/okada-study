<?php

//phpファイルを読み込む
require_once 'place.php';

//名前空間をインポート
use asia\japan\tokyo as name;

//関数の呼出し
echo name\shibuya\getName();
echo '<br>';
echo name\minato\getName();
echo '<br>';
echo name\shinagawa\getName();

//shibuya
//minato
//shinagawa


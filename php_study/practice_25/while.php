<?php
ini_set('max_execution_time', '4000');
$time_start = microtime(true);
$dsn = 'mysql:host=mysql;dbname=test;charset=UTF8'; // コンテナ名 "mysql" をホスト名として指定
$user = 'test';
$password = 'test';
$count =0;

while ($count < 10000){
    $dbh = new PDO($dsn, $user, $password);

    $sql = 'select * from list';
    $array =[];
    foreach ($dbh->query($sql) as $row) {
        array_push($array,$row['id'] );
    }
    $id =0;
    $result =false;
    while ($result !== false){

        $id = mt_rand();
        $result = array_search($id, $array);
    }
    $value =$str2 = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789"), 0, 16);;
    $dbh->query('SET NAMES sjis');
    $sql = 'insert into list values (?,?, 99)';
    $stmt = $dbh->prepare($sql);
    $flag = $stmt->execute(array($id, $value));

    if ($flag){
        print('');
    }else{
        print('データの追加に失敗しました<br>');
    }
    $count++;
}

$time_end = microtime(true);
$time = $time_end - $time_start;
var_dump($time); //実行時間を出力する
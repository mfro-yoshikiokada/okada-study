<html>
<head><title>PHP TEST</title></head>
<body>
<h1>POST送信</h1>
<form method="post" action="add.php">
    <input type="text" name="value" size="15" value="">
    <input type="submit" value="送信">
</form>
<?php

$dsn = 'mysql:host=mysql;dbname=test;charset=UTF8'; // コンテナ名 "mysql" をホスト名として指定
$user = 'test';
$password = 'test';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');

    $dbh->query('SET NAMES sjis');

    $sql = 'select * from list';
    foreach ($dbh->query($sql) as $row) {
        print($row['id']);
        print($row['name']);
        $link = "./delete.php?value={$row['id']}";
        print("<a href=$link>削除</a><br>");
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;
$time_end = microtime(true);
$time = $time_end - $time_start;
var_dump($time); //実行時間を出力する
?>

</body>
</html>
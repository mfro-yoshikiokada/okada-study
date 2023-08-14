
<html>
<head><title>PHP TEST</title></head>
<body>
<h1>POST送信</h1>
<?php

$dsn = 'mysql:host=mysql;dbname=test;charset=UTF8'; // コンテナ名 "mysql" をホスト名として指定
$user = 'test';
$password = 'test';
echo $_POST['value'];
try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');
    $value =$_POST['value'];
    $dbh->query('SET NAMES sjis');
    $id = mt_rand();
    $sql = 'insert into list values (?,?, 21)';
    $stmt = $dbh->prepare($sql);
    $flag = $stmt->execute(array($id, $value));

    if ($flag){
        print('データの追加に成功しました<br>');
    }else{
        print('データの追加に失敗しました<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
<a href="index.php">戻る</a>
</body>
</html><?php

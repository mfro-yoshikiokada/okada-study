<html>
<head><title>PHP TEST</title></head>
<body>

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
        print($row['name'].'<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>

</body>
</html>
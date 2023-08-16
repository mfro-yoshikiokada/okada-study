<?php
$servername = "mysql";
$username = "test";
$password = "test";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->begin_transaction();

try {
    // 1つ目のUPDATE文を実行
    $sql1 = "UPDATE list SET age = 0, name = 'john smith' WHERE 1";
    $conn->query($sql1);

    // 2つ目のUPDATE文を実行
    $sql2 = "UPDATE list SET age = 999, name = 'bbbb' WHERE 88";
    $conn->query($sql2);

    $conn->commit();
    echo "Transaction committed successfully.";
} catch (Exception $e) {
    $conn->rollback();
    echo "Transaction rolled back due to an exception: " . $e->getMessage();
}

// 接続を閉じる
$conn->close();


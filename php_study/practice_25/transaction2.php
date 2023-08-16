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

    $sql1 = "UPDATE list SET age = 1, name = 'john' WHERE 1";

    if (!$conn->query($sql1)) {
        throw new Exception("sql1 failed.");
    }
    $sql2 = "UPDATE  SET age = 0, name = 'john smith' WHERE 1";

    if (!$conn->query($sql2)) {
        throw new Exception("sql2 failed.");
    }

    // トランザクションをコミット
    $conn->commit();
    $conn->commit();
    echo "Transaction committed successfully.";
} catch (Exception $e) {

    $conn->rollback();
    echo "Transaction rolled back due to an exception: " . $e->getMessage();
} finally {

    $conn->close();
}
/*
 * 挙動確認：
 * 条件分岐で何もせずに命令文を出すと何もない状態でerrorも出ずそのまま実行されできないものは無視される。
 * 条件分岐をするとerrorが出てrollbackすることで前行った処理も行う前の状態に戻る。
 */
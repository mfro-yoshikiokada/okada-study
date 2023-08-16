<?php
$servername = "mysql";
$username = "test";
$password = "test";
$dbname = "test";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// トランザクションを開始
$conn->begin_transaction();

try {
    // 2つ目のUPDATE文を実行（正しいクエリに修正する必要があります）
    $sql2 = "UPDATE list SET age = 25, name = 'example' WHERE id = 1";
    $conn->query($sql2);

    // トランザクションをコミット
    $conn->commit();
    echo "Transaction committed successfully.";
} catch (Exception $e) {
    // 例外が発生した場合、トランザクションをロールバック
    $conn->rollback();
    echo "Transaction rolled back due to an exception: " . $e->getMessage();
} finally {
    // 接続を閉じる
    $conn->close();
}
?>

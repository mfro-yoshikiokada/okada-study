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
    $sql1 = "UPDATE list SET age = 0, name = 'john smith' WHERE 1";

    if (!$conn->query($sql1)) {
        throw new Exception("sql1 failed.");
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

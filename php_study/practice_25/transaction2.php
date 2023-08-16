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
    $sql1 = "UPDATE list SET age = 25, name = 'example' WHERE id = 1";
    $conn->query($sql1);

    $sql2 = "UPDATE list SET age = '257897897895456745456546', name = example WHERE id = 1";
    $conn->query($sql2);


    $conn->commit();
    echo "Transaction committed successfully.";
} catch (Exception $e) {

    $conn->rollback();
    echo "Transaction rolled back due to an exception: " . $e->getMessage();
} finally {

    $conn->close();
}

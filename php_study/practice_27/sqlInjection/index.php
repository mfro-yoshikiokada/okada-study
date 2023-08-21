<?php
try {
    $records = [];
    $id = $_POST['id'];

    $pdo = new PDO(
        'mysql:host=mysql;dbname=sazae;charset=UTF8',
        'root',
        'root'
    );
    $prepare = $pdo->prepare('SELECT * FROM users WHERE id = '. $id. ';');
    $prepare->execute();
    $records = $prepare->fetchAll(PDO::FETCH_ASSOC);
    var_dump($records);
} catch(PDOException $e) {
    echo $e->getMessage();
}


/*
 * array(8) { [0]=> array(2) { ["id"]=> string(1) "1" ["name"]=> string(5) "sazae" } [1]=> array(2) { ["id"]=> string(1) "2" ["name"]=> string(5) "masuo" } [2]=> array(2) { ["id"]=> string(1) "3" ["name"]=> string(7) "namihei" } [3]=> array(2) { ["id"]=> string(1) "4" ["name"]=> string(4) "fune" } [4]=> array(2) { ["id"]=> string(1) "5" ["name"]=> string(5) "katuo" } [5]=> array(2) { ["id"]=> string(1) "6" ["name"]=> string(6) "wakame" } [6]=> array(2) { ["id"]=> string(1) "7" ["name"]=> string(5) "tarao" } [7]=> array(2) { ["id"]=> string(1) "8" ["name"]=> string(4) "tama" } }
 * array(0) { }
 */
?>

<?php
require_once('./Fruits/Fruit.php');
require_once('./Fruits/Orange.php');
require_once('./Fruits/Apple.php');

use Fruits\Fruit;
use Fruits\Orange;
use Fruits\Apple;
use Fruits\Grape;
use Fruits\NoneFruit;

$fruitName = getFruitNameByUrlPath();
$fruitData = getFruitData($fruitName);

function getFruitNameByUrlPath(){
    if(!isset($_GET['fruit'])){
        return 'none';
    }
    return $_GET['fruit'];
}

function getFruitData($fruitName){
    $fruit = getFruitInstance($fruitName);
    $fruitContext = new Fruit($fruit);
    return $fruitContext->execute();
}

function getFruitInstance($fruitName) {
    switch ($fruitName) {
        case 'orange':
            return new Orange;
        default:
            return new Apple;
    }
}

?>

<?php
echo "<table border = '1'>";
echo "   <tr>";
echo "        <th>名前</th>";
echo "        <th>色</th>";
echo "        <th>好き or 嫌い</th>";
echo "        <th>人気順位</th>";
echo "    </tr>";
echo "    <tr>";
echo "        <th>$fruitData[name]</th>";
echo "        <th>$fruitData[color]</th>";
echo "        <th>$fruitData[has_like]</th>";
echo "        <th>$fruitData[order_of_popularity]</th>";
echo "    </tr>";
echo "</table>";
?>

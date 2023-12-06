<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
 <p>コメントがたくさんのページだよー</p>   
<?
var_dump($comments);
?>

<form action="../../public/comment/create.php" method="POST" style="margin-top: 20px">
    <input type="text" name="body">
    <button type="submit">送信</button>
</form>
</body>
</html>


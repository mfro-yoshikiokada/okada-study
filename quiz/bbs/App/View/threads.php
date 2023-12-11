<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
 <p>コメントがたくさんのページだよー</p>   
<?php
var_dump($_SESSION);
echo '<ul>';
foreach ($comments as $pref){
    echo '<li><p>id:'.$pref ["user_id"].'</p><p>'.$pref ["comment_text"].'</p><p>time:'.$pref ["created_at"].'</p></li>';
}
echo '</ul>';
?>

<form action="../../public/comment/create.php" method="POST" style="margin-top: 20px">
    <input type="text" name="body">
    <button type="submit">送信</button>
</form>
</body>
</html>


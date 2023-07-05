<?php

$user_id = uniqid(rand(), true);

if (empty($_COOKIE['user_id'])){
    setcookie('user_id', $user_id, time() + 30 * 24 * 3600);
}
?>

<html>
<head><title>PHP TEST</title></head>
<body>
<h1>cookie 追加</h1>>
<?php
print('<p>'.$_COOKIE['user_id'].'</p>');
?>

</body>
</html>
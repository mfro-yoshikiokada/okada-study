<?php

if (isset($_COOKIE['user_id'])){
    setcookie('user_id', "", time()-1);
}
?>

<html>
<head><title>PHP TEST</title></head>
<body>
<h1>cookie 削除</h1>>
<?php
print('<p>'.$_COOKIE['user_id'].'</p>');
?>

</body>
</html>
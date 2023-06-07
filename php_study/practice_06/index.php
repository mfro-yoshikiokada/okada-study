<?php

echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
//http://localhost:8000/php_study/practice_06/index.php/?name=Yoshiki とすると　Hello Yoshiki!と出る
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    yourname:<input type="text" name="yourname" value="山田">
</form>

<?php echo $_POST['yourname']; ?>


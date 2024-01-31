<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>

<body>
<div class="form-group mx-auto p-1 w-50">
    <h1>Login</h1>
</div>
<form action="./post.login.php" method="POST" style="margin-top: 20px">
    <div class="form-group mx-auto p-1 w-50">
        <input type="email" class="form-control" name="mailAddress" aria-describedby="emailHelp" placeholder="email">
    </div>
    <div class="form-group mx-auto p-1 w-50">
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group mx-auto p-1 w-50">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</body>
<?php include "footer.html" ?>
<?php include "script.html" ?>
</html>

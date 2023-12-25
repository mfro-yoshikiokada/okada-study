<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous"
    >
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler"
                    type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active"
                           aria-current="page"
                           href="/quiz/bbs/public/users/siginup.php"
                        >signup</a>
                    </li>
            </div>
        </div>
    </nav>
</header>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
></script>
</html>

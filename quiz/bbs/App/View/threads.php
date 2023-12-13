<?php session_start();
header("Cache-Control:no-cache, no-store,must-revalidate,max-age=0");
header("Cache-Control:pre-check=0", "post-check=0", false);
header("Pragma:no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
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
                           href="/quiz/bbs/public/users/logout.php"
                        >
                            Logout
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<body>

<form action="../../public/comment/create.php" method="POST" style="margin-top: 20px">
    <input type="text" name="body">
    <button type="submit">送信</button>
</form>
 <p>コメントがたくさんのページだよー</p>
 <?php
    echo "<p>ぽまえID".$_SESSION["id"]."番な</p>";
    echo '<ol class="list-group list-group-numbered">';
    foreach ($comments as $pref) {
        echo '
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">'.$pref ["nickname"].'</div>
                 '.$pref ["comment_text"].'
                </div>
                <span class="badge bg-primary rounded-pill">'.$pref ["created_at"].'</span>   
            </li>
            ';
    }
    echo '</ol>';
?>

</body>
<script src="./../../style/js/bootstrap.bundle.min.js"
       ></script>
</html>


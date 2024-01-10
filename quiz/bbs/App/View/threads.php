<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>

<body>

<form action="../../public/comment/create.php" method="POST">
    <input class="form-control" type="text" name="body">
    <button class="btn btn-primary" type="submit">送信</button>
</form>

 <p>コメントがたくさんのページだよー</p>
    <p>ぽまえID<?= $_SESSION["id"] ?>番な</p>
    <ol class="list-group list-group-numbered">
        <?php foreach ($comments as $pref) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo $pref["nickname"]; ?></div>
                    <?php echo $pref["comment_text"]; ?>
                </div>
                <span class="badge bg-primary rounded-pill"><?php echo $pref["created_at"]; ?></span>
            </li>
        <?php endforeach; ?>
    </ol>

</body>
<?php include "footer.html" ?>
</html>



<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>

<body>
<div class="list-group list-group-numbered">
    <div class="m-2 me-auto">
        <span class="d-block badge bg-primary rounded-pill"><?php echo $comment["created_at"]; ?></span>

        <h3 class="d-inline-block m-1"><?php echo  $comment["comment_text"]; ?></h3>
        <div class="float-right m-2">

            <?php if ($comment["user_id"] == $_SESSION["id"]) : ?>
                <a href="../../public/comment/delete.php?id=<?= $comment["id"] ?>&user=<?= $comment["user_id"] ?>"
                   type="button"
                   class="btn btn-danger m-1"
                >
                    DELETE
                </a>
                <a href="../../public/comment/edit.show.php?id=<?= $comment["id"] ?>"
                   type="button"
                   class="btn btn-secondary"
                >
                    EDIT
                </a>
            <?php endif; ?>

        </div>
    </div>
</div>
<form action="../../public/reply/create.php" method="POST" class="m-2">
    <input type="text" class="d-inline-block w-75 form-control" name="body">
    <input  type="hidden" class="form-control" name="comment_id"
            value="<?php echo $comment["id"]; ?>">
    <button type="submit" class="d-inline-block btn btn-primary" name="submit">送信</button>
</form>
<ol class="list-group list-group-numbered min-height">
    <?php foreach ($replies as $pref) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><?php echo $pref["nickname"]; ?></div>
                <?php echo $pref["reply_text"]; ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?php echo $pref["created_at"]; ?></span>
        </li>
    <?php endforeach; ?>
</ol>

</body>
<?php include "footer.html" ?>
<?php include "script.html" ?>
</html>


<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>

<body>

<form action="../../public/reply/create.php" method="POST">
    <input type="text" class="form-control" name="body">
    <input  type="hidden" class="form-control" name="comment_id"
           value="<?php echo $comment["id"]; ?>">
    <input  type="hidden" class="form-control" name="user_id"
           value="<?php echo $_SESSION['id']; ?>">
    <button type="submit" class="btn btn-primary" name="submit">送信</button>
</form>

<div class="list-group list-group-numbered">
    <div class="ms-2 me-auto">
        <span class="badge bg-primary rounded-pill"><?php echo $comment["created_at"]; ?></span>

        <h3><?php echo  $comment["comment_text"]; ?></h3>
    </div>
</div>

<ol class="list-group list-group-numbered">
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
</html>

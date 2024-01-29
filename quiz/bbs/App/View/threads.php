<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>
<body>

<form action="../../public/comment/create.php" method="POST" class="inline-block m-2">
    <textarea name="body" rows="3" cols="33"class="d-inline-block w-75 form-control" style="resize: none;" required>

</textarea>
    <button class="btn btn-primary m-2 mb-5" type="submit">送信</button>
</form>
 <p>コメントがたくさんのページだよー</p>
    <p>ぽまえID<?= $_SESSION["id"] ?>番な</p>
    <ol class="list-group list-group-numbered min-height">
        <?php foreach ($comments as $key => $pref) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo htmlspecialchars($pref["nickname"], ENT_QUOTES, 'UTF-8'); ?></div>
                    <?php echo nl2br(htmlspecialchars($pref["comment_text"], ENT_QUOTES, 'UTF-8')); ?>
                </div>
                <div>
                <span class="badge bg-primary rounded-pill"><?php echo $pref["created_at"]; ?></span>
                    <p>
                        <a class="link-opacity-100"
                           href="../../public/reply/show.php?comment=<?php echo  $pref["id"]; ?>">
                            返信<?php echo
                            (empty($numberOfReplies[$pref["id"]])) ? 0 : $numberOfReplies[$pref["id"]];
                            ?>件
                        </a>
                    </p>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>

</body>
<?php include "footer.html" ?>
<?php include "script.html" ?>
</html>


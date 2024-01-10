
<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>

<body>
<?php
$result = "";
if (isset($_POST['submit'])) {
    var_dump($_POST);

    $url = 'http://localhost:8000/quiz/bbs/public/reply/create.php';

    $data = array(
        'body' => $_POST["body"],
        'user_id' => $_SESSION['id'],
        'comment_id' => $comment["id"]
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        echo $response;
    }

    curl_close($ch);
}
?>
<form action="../../public/reply/create.php" method="POST">
    <input type="text" class="form-control" name="body">
    <input type="text" class="form-control" name="comment_id"
           value="<?php echo $comment["id"]; ?>" style="display:none;">
    <button type="submit" class="btn btn-primary" name="submit">送信</button>
</form>

<div class="list-group list-group-numbered">
    <div class="ms-2 me-auto">
        <span class="badge bg-primary rounded-pill"><?php echo $comment["created_at"]; ?></span>
    <h2 class="fw-bold"><?php echo $comment["id"]; ?></h2>
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

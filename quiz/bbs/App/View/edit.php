
<!DOCTYPE html>
<?php include "head.html" ?>
<?php include "header.html" ?>

<body>
<form action="../../public/comment/edit.php" method="POST" class="m-2">
    <input type="text" class="d-inline-block w-75 form-control"
           name="body" value="<?php echo $comment["comment_text"]; ?>"
    >
    <input  type="hidden" class="form-control" name="comment_id"
           value="<?php echo $comment['id'] ?>">
    <input  type="hidden" class="form-control" name="user_id"
           value="<?php echo $_SESSION['id']; ?>">
    <button type="submit" class="btn btn-primary" name="submit">EDIT</button>
</form>

</body>
<?php include "footer.html" ?>
</html>

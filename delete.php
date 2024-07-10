<?php
require 'function.php';

$post_id = $_POST['post_id'];
delete($post_id);
?>

<?php require 'header.php'; ?>

<div class="container my-5 mx-auto" style="width: 900px;  height: 600px;">
    <h3 class="my-5" style="border-bottom:solid 5px #999; padding-bottom:10px;">Successfully Deleted</h3>
    削除されました。
    <div class="btn" style="float: right;">
        <a href="/" class="btn btn-primary my-5">HOME</a>
    </div>
</div>

<?php require 'footer.php'; ?>

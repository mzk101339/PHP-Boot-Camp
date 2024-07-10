<?php
require 'function.php';

$posts = get_like_posts();
?>

<?php require 'header.php'; ?>

<div class="container col-12 col-lg-10 d-flex justify-content-center">
    <div class="col-12 col-lg-10">
        <?php foreach ($posts as $post) : ?>
            <div class="card mt-4">
                <div class="card-title d-flex justify-content-between  align-items-center">
                    <div class="d-flex align-items-center p-2">
                        <img src="./img/profile.jpg" height="30" class="rounded-circle border">&nbsp;&nbsp;Guest
                    </div>
                </div>
                <img src="data:image/jpeg;base64,<?= base64_encode($post['image']) ?>" />
                <div class="card-body mb-3">
                    <?php echo $post['text'] ?>
                </div>
                <div class="card-footer">
                    <i class="bi bi-heart<?= $post['likes'] ? '-fill text-danger' : '' ?>" post-id="<?= $post['id'] ?>" onclick="toggleLike(this)"></i>
                </div>
                <div class="input-group p-2 border-top">
                    <input type="text" class="form-control rounded-0 border-0" placeholder="comment..">
                    <button class="btn btn-outline-primary rounded-0 border-0" type="button">Post</button>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
    function toggleLike(element) {
        var postId = element.getAttribute('post-id');
        var xhr = new XMLHttpRequest();
        var isLiked = element.classList.contains('bi-heart-fill');

        xhr.open('POST', 'like_toggle.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                if (isLiked) {
                    element.classList.remove('bi-heart-fill', 'text-danger');
                    element.classList.add('bi-heart');
                } else {
                    element.classList.remove('bi-heart');
                    element.classList.add('bi-heart-fill', 'text-danger');
                }
            }
        };
        xhr.send('post_id=' + postId);
    }
</script>

<?php require 'footer.php'; ?>
<?php
require 'function.php';

$text = $_POST['text'];
$image = file_get_contents($_FILES['image']['tmp_name']);

create($text, $image);
?>

<?php require 'header.php'; ?>

<div class="container my-5 mx-auto" style="width: 900px; height:800px;">
    <h3 class="my-5" style="border-bottom:solid 5px #999; padding-bottom:10px;">Successfully Posted</h3>
    <div class="card mt-4">
        <div class="card-title d-flex justify-content-between  align-items-center">
            <div class="d-flex align-items-center p-2">
                <img src="./img/profile.jpg" height="30" class="rounded-circle border">&nbsp;&nbsp;Guest
            </div>
        </div>
        <img src="data:image/jpeg;base64,<?= base64_encode($image) ?>" />
        <div class="card-body mb-3">
            <?php echo $text ?>
        </div>
    </div>
    <div class="btn" style="float: right;">
        <a href="/" class="btn btn-primary my-5">HOME</a>
    </div>
</div>
 
<?php require 'footer.php'; ?>
<?php require 'header.php'; ?>

<div class="container my-5 mx-auto" style="width: 900px;  height: 600px;">
    <h3 class="my-3" style="border-bottom:solid 5px #999; padding-bottom:10px;">POST</h3>
    <div class="form1 my-5">
        <form action="complete.php" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="image" class="col-sm-3 col-form-label">IMAGE</label>
                <div class="col-sm-9">
                    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                    <input type="file" name="image" id="image" accept="image/*" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="text" class="col-sm-3 col-form-label">TEXT</label>
                <div class="col-sm-9">
                    <textarea name="text" id="text"></textarea>
                </div>
            </div>
            <div class="btn" style="float: right;">
                <input type="submit" value="POST" class="btn btn-primary my-5">
            </div>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>
<?php
require 'function.php';

if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
    toggle_like($post_id);
}

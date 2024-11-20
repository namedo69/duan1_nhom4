<?php
include_once './model/comment.php';

if (isset($_GET['id'])) {
    $commentId = $_GET['id'];
    deleteComment($commentId);
        $script = "<script> 
        alert('Đã xóa bình luận!');
        window.location = 'index.php?action=listcomment';
        </script>";
   

    echo $script;
}
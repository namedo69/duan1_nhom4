<?php
include_once 'pdo.php';

// Hàm lấy danh sách bình luận
function listComment() {
    $sql = 'SELECT * FROM comment';
    return pdo_query($sql);
}

// Hàm xóa bình luận
function deleteComment($commentId) {
    $sql = 'DELETE FROM comment WHERE comment_id = ?';
    pdo_execute($sql, $commentId); // Thực thi câu lệnh xóa
}




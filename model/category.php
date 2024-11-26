<?php
include_once 'pdo.php';

function getAllCategory()
{
    $sql = "SELECT * FROM category";
    return pdo_query($sql);
}
function getCategoryById($id)
{
    $sql = "SELECT * FROM category WHERE category_id = $id";
    return pdo_query_one($sql);
}

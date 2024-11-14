<?php
include_once 'pdo.php';

function getAllCategory()
{
    $sql = "SELECT * FROM category";
    return pdo_query($sql);
}
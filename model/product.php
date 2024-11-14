<?php
include_once "pdo.php";

function getNewProduct($limit)
{
    return pdo_query("SELECT * FROM product ORDER BY product_id DESC LIMIT $limit");
}

function getProductByView($limit)
{
    return pdo_query("SELECT * FROM product ORDER BY view DESC LIMIT $limit");
}
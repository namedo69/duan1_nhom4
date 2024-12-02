<?php
include_once "pdo.php";

function getAllProduct()
{
    return pdo_query("SELECT * FROM product");
}
function getNewProduct()
{
    return pdo_query("SELECT * FROM product ORDER BY product_id DESC ");
}

function getProductByView()
{
    return pdo_query("SELECT * FROM product ORDER BY view DESC");
}
function getMostCommentProduct()
{
    $sql = "SELECT p.product_id, p.name, p.image, p.price, p.status, COUNT(c.comment_id) AS comment_count
            FROM product AS p
            LEFT JOIN comment AS c ON p.product_id = c.product_id
            GROUP BY p.product_id, p.name, p.image, p.price, p.status
            ORDER BY comment_count DESC ";
    return pdo_query($sql);
}

function getProductByID($id)
{
    return pdo_query_one("SELECT p.product_id, p.name, p.price, p.image, p.description, p.view, p.category_id , c.name as category_name FROM product p
                            INNER JOIN category c
                            ON p.category_id = c.category_id
                            WHERE p.product_id = $id");
}
function getRandomProduct($id)
{
    return pdo_query("SELECT * FROM product WHERE category_id = $id ORDER BY RAND() LIMIT 4");
}
function increaseView($id)
{
    return pdo_execute("UPDATE product SET view = view + 1 WHERE product_id = $id");
}
function getProductByCategory($id)
{
    return pdo_query("SELECT * FROM product WHERE category_id = $id");
}
function countProduct()
{
    return pdo_query("SELECT COUNT(*) as total FROM product");
}
function productSearch($keyword)
{
    return pdo_query("SELECT * FROM product WHERE name LIKE '%$keyword%'");
}
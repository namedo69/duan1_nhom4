<?php
 include_once 'pdo.php';
           
function listHoaDon()
{
    $sql = 'select * from bill';
    return pdo_query($sql);
}

function listClient()
{
    $sql = 'select * from client';
    return pdo_query($sql);
}

function listComment()
{
    $sql = 'select * from comment';
    return pdo_query($sql);
}
function listProduct()
{
    $sql = 'select * from product';
    return pdo_query($sql);
}
function getMonthlyRevenue($listHoaDon) {
    $sql = "SELECT 
    SUM(total) AS total_revenue
    FROM 
    bill
    WHERE 
    status = 0
    AND DATE_FORMAT(created_at, '%Y-%m') = '2024-11'";

return  pdo_query_value($sql);
}

function countBill($listHoaDon) 
{
    $sql = "SELECT COUNT(*) AS total_bills
FROM bill
WHERE status = 0;
";

return  pdo_query_value($sql);
}

function countProduct($listProduct) 
{
    $sql = "SELECT COUNT(*) AS product_id
FROM product;
";

return  pdo_query_value($sql);
}

function countClient($listClient) 
{
    $sql = "SELECT COUNT(*) AS client_id
            FROM client
            WHERE status = 1"; 
    return pdo_query_value($sql); 
}


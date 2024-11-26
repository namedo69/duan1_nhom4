<?php
include_once 'pdo.php';
function listComments($id)
{
    return pdo_query("SELECT * FROM comment cm INNER JOIN client c ON cm.client_id = c.client_id where cm.product_id = $id ");

}
function addComment($client_id, $product_id, $content)
{
    return pdo_execute("INSERT INTO comment (product_id, client_id, content) VALUES ('$product_id', '$client_id', '$content')");
}
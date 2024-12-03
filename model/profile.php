<?php
include_once("pdo.php");

function getClientById($id)
{
    $sql = "select * from client where client_id=$id";
    return pdo_query_one($sql);
}
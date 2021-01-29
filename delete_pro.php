<?php

include "config.php"; // Using database connection file here
session_start();
$product_id = $_GET['product_id']; // get id through query string

$qry = mysqli_query($db,"DELETE  FROM PRODUCT WHERE product_id='$product_id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

header("location:list.php");

?>
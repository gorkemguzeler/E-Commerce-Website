<?php

include "config.php"; // Using database connection file here
session_start();
$order_id = $_GET['order_id']; // get id through query string

$qry = mysqli_query($db,"DELETE  FROM ORDERS WHERE order_id='$order_id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data


header("location:sm_order.php");

?>
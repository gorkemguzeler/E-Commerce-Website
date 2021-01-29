<?php

session_start();

include "config.php";


if (isset($_POST['name'])){

$customer_id = $_SESSION['id'];
$quantity = $_POST['quantity'];
$product_id = $_POST['product_id'];
$price = $_POST['price'];
$name = $_POST['name'];



if ($quantity == 0){
	$quantity  = 1;
}

if ($quantity < 0){
	$quantity  = 1;
}



$query = "SELECT COUNT(*) AS C FROM BASKET WHERE BASKET.customer_id = $customer_id AND BASKET.product_id IN ($product_id)";

$result = mysqli_query($db, $query);
$count = mysqli_fetch_assoc($result)["C"];


if($count  == 0){
	$sql_statement = "INSERT INTO BASKET(cost, quantity,product_name ,product_id, customer_id)
					VALUES ('$price','$quantity', '$name','$product_id','$customer_id')";
	
	mysqli_query($db, $sql_statement);
}
else{

$sql_statement = "SELECT quantity FROM BASKET WHERE BASKET.customer_id = $customer_id AND BASKET.product_id = $product_id ";

//UPDATE QUERY yaz :D
$query2 = "UPDATE BASKET SET quantity = quantity + $quantity WHERE customer_id = $customer_id AND product_id = $product_id ";

$query3 = "UPDATE BASKET SET cost = cost + $price WHERE customer_id = $customer_id AND product_id = $product_id ";

mysqli_query($db, $sql_statement);
mysqli_query($db, $query2);

}

header ("Location: list.php");

}

else
{

	echo "The form is not set.";

}


?>
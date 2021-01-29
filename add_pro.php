



<h3>ADD PRODUCT</h3>

<form method="POST">
  <input type="text" name="category_id" value="" placeholder="Enter Product's Category ID" Required>
  <input type="text" name="name" value="" placeholder="Enter Product Name" Required>
  <input type="text" name="rating" value="0" placeholder="Enter Product Rating as 0" Required>
  <input type="text" name="model" value="" placeholder="Enter Product Model" Required>
  <input type="text" name="price" value="" placeholder="Enter Product Price" Required>
  <input type="text" name="image_path" value="" placeholder="Enter Product Image Path" Required>
  <input type="submit" name="add" value="ADD">
</form>





<?php

include "config.php"; // Using database connection file here
session_start();
//$product_id = $_GET['product_id']; // get id through query string

//$qry = mysqli_query($db,"SELECT * FROM PRODUCT WHERE product_id='$product_id'"); // select query

//$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['add'])) // when click on Update button
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
	$rating = $_POST['rating'];
    $image_path = $_POST['image_path'];
    $model = $_POST['model'];
    

    $add = mysqli_query($db,"INSERT INTO PRODUCT (category_id,name,rating,model,price,image_path) VALUES ('$category_id', '$name', '$rating', '$model','$price','$model')");
	
    if($add)
    {
        mysqli_close($db); // Close connection
        header("location:list.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>


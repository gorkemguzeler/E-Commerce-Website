<?php

include "config.php"; // Using database connection file here
session_start();
$product_id = $_GET['product_id']; // get id through query string

$qry = mysqli_query($db,"SELECT * FROM PRODUCT WHERE product_id='$product_id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $price = $_POST['price'];
	$model = $_POST['model'];
    
    
    $edit = mysqli_query($db,"UPDATE PRODUCT SET name='$name', price='$price',model='$model' WHERE product_id='$product_id'");
	
    if($edit)
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

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter Product Name" Required>
  <input type="text" name="price" value="<?php echo $data['price'] ?>" placeholder="Enter Product Price" Required>
  <input type="text" name="model" value="<?php echo $data['model'] ?>" placeholder="Enter Product Model" Required>
  <input type="submit" name="update" value="Update">
</form>
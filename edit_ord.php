<?php

include "config.php"; // Using database connection file here
session_start();
$order_id = $_GET['order_id']; // get id through query string

$qry = mysqli_query($db,"SELECT * FROM ORDERS WHERE order_id='$order_id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $status = $_POST['status'];    
    
    $edit = mysqli_query($db,"UPDATE ORDERS SET status='$status' WHERE order_id='$order_id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:sm_order.php"); // redirects to all records page
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
  <input type="text" name="status" value="<?php echo $data['status'] ?>" placeholder="Enter Updated Order Status" Required>
  <input type="submit" name="update" value="Update">
</form>
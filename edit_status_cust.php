<?php

session_start();

include "config.php"; // Using database connection file here

$user_id = $_SESSION['id']; // get id through query string

$qry = mysqli_query($db,"SELECT * FROM USERS WHERE user_id='$user_id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data


$qry2 = mysqli_query($db,"SELECT * FROM CUSTOMER WHERE customer_id='$user_id'"); 


$data2 = mysqli_fetch_array($qry2);

if(isset($_POST['update'])) // when click on Update button
{
    $password = $_POST['password']; 
    $username = $_POST['username'];    
    $first_name = $_POST['first_name'];  
    $last_name = $_POST['last_name'];  
    $email = $_POST['email'];  
    $address = $_POST['address'];  
    $phone = $_POST['phone'];  

    
    $edit = mysqli_query($db,"UPDATE USERS SET username='$username',password='$password',first_name='$first_name',last_name='$last_name' WHERE user_id='$user_id'");
    
    $edit2 = mysqli_query($db,"UPDATE CUSTOMER SET customer_id='$user_id',phone='$phone',address='$address',email='$email' WHERE customer_id='$user_id'");


    if($edit && $edit2 )
    {
       // mysqli_close($db); // Close connection
        header("location:status.php"); // redirects to all records page
        exit;
    }
       	
}
?>

<h3>Update Personal Information</h3>

<form method="POST">
<input type="text" name="password" value="<?php echo $data['password'] ?>" placeholder="Enter New Password" Required>
<input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter New Username" Required>
  <input type="text" name="first_name" value="<?php echo $data['first_name'] ?>" placeholder="Enter First Name" Required>
  <input type="text" name="last_name" value="<?php echo $data['last_name'] ?>" placeholder="Enter Last Name" Required>
  <input type="text" name="email" value="<?php echo $data2['email'] ?>" placeholder="Enter Email " Required>
  <input type="text" name="address" value="<?php echo $data2['address'] ?>" placeholder="Enter Address" Required>
  <input type="text" name="phone" value="<?php echo $data2['phone'] ?>" placeholder="Enter Phone Number" Required>
  <input type="submit" name="update" value="Update">
</form>
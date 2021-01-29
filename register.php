<?php
// Change this to your connection info.
//session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'coffeeshop';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['first_name'],$_POST['last_name'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}


// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT user_id, password FROM USERS WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
    } 
    else {

		include "config.php";
		// Username doesnt exists, insert new account
		$username = $_POST['username'];
		$password = $_POST['password'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];


		$sql_statement = "INSERT INTO USERS (username, password,first_name ,last_name)VALUES ('$username','$password', '$first_name','$last_name')";
		mysqli_query($con, $sql_statement);

		//$q = "SELECT user_id FROM USERS BY user_id DESC LIMIT 1" ;
		$q = "SELECT MAX(user_id) AS C  FROM USERS WHERE user_id>0";
		$result = mysqli_query($db, $q);

		$row = mysqli_fetch_assoc($result)["C"];


		$sql_statement2= "INSERT INTO CUSTOMER (customer_id, phone, address,email) VALUES ( '$row', '$phone', '$address','$email')";
		mysqli_query($db, $sql_statement2);

        echo 'You have successfully registered, you can now login!';
        header('Location: login.html');
    }
        
        // Insert new account
	}
	$stmt->close();
$con->close();
?>
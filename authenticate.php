
<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'coffeeshop';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT user_id, password FROM USERS WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	echo "Hello ";
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($user_id, $password);
		$stmt->fetch();
		// Account exists, now we verify the password.
		// Note: remember to use password_hash in your registration file to store the hashed passwords.
		if ($_POST['password'] == $password) {
			// Verification success! User has logged-in!
			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $user_id;
	
			if ($_SESSION['id']==12 || $_SESSION['id']==13 || $_SESSION['id']==14 )
			{
				$_SESSION['sm']=1;
			}
			if ($_SESSION['id']==5 ||$_SESSION['id']==7 || $_SESSION['id']==8 )
			{
				$_SESSION['pm']=1;
			}

			echo 'Welcome ' . $_SESSION['id'] . '!';

			// BASKET REFRESH
			include "config.php";

			$a = $_SESSION['id'];

			$sql_command = "DELETE FROM BASKET ";

			$myresult11 = mysqli_query($db, $sql_command);

			mysqli_fetch_assoc($myresult11);
			// BASKET REFRESH


			header('Location: index.php');
			
		} else {
			// Incorrect password
			echo 'Incorrect username and/or password!';
		}
	} else {
		// Incorrect username
		echo 'Incorrect username and/or password!';
	}

	$stmt->close();
}
?>
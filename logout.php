<?php

include "config.php";

session_start();

$a = $_SESSION['id'];

$sql_command = "DELETE FROM BASKET";

$myresult = mysqli_query($db, $sql_command);

mysqli_fetch_assoc($myresult);

session_destroy();



// Redirect to the login page:
header('Location: index.php');
?>

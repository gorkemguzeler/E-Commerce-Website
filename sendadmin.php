<?php 

include "config.php";

if (isset($_POST['product_id'])){

$id = $_POST['product_id'];


$sql_statement = "DELETE FROM BASKET WHERE product_id = $id";

$result = mysqli_query($db, $sql_statement);


header ("Location: new.php");

}

else
{

	header ("Location: new.php");
	
	echo "The form is not set2.";

}

?>
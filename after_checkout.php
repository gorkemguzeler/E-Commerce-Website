<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

include "config.php";

?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <style>
      body {
        background-image: url('./images/sign in:up alternative.png');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
      }
      </style>

<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style_login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <meta charset="utf-8">
    <title>Coffee House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <![endif]-->
  </head>

<!--style="background-image: url('./images/sign in:up alternative.png');" background-size: cover;   background-repeat: no-repeat;
    background-attachment: fixed; -->


  <body>


 
  <div class="container" >

<div class="masthead">
  <h3 class="muted" style="color:white">Coffee House</h3>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container">


        <ul class="nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Categories
              <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
              <li class="nav-header">Coffees</li>
              <li><a href="filter_coffee_products.php">Filter coffee</a></li>
              <li><a href="turkish_coffee_products.php">Turkish coffee</a></li>
              <li><a href="espresso_products.php">Espresso</a></li>
              <li><a href="hot_chocolate_products.php">Hot chocolate</a></li>
              <li class="divider"></li>
              <li class="nav-header">Coffee Machines</li>
              <li><a href="filter_coffee_machines_products.php">Filter coffee Machine</a></li>
              <li><a href="turkish_coffee_machine.php">Turkish coffee machine</a></li>
              <li><a href="espresso_coffee_machine.php">Espresso machine</a></li>
            </ul>
          
          </li>
          <?php
                if(isset($_SESSION['loggedin'])) {
                 ?>
                 <li><a href="status.php">My Account</a></li>
                <?php
                    }
                  ?> 
                <li><a href="new.php">My Cart</a></li>
                <li><a href="list.php">All Products</a></li>
                <?php
                if(isset($_SESSION['loggedin']) && ($_SESSION['sm']!=0)) {
                 ?>
                 <li><a href="sm_order.php">Admin Orders</a></li>
                <?php
                    }
                  ?> 
                  <?php
                if(isset($_SESSION['loggedin']) && ($_SESSION['pm']!=0)) {
                 ?>
                 <li><a href="pm_product.php">Admin Products</a></li>
                <?php
                    }
                  ?> 

                <?php
                if(isset($_SESSION['loggedin'])) {
                 ?>
                 <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                <?php
                    }
                  ?> 
        </ul>
      </div>
    </div>
  </div><!-- /.navbar -->
</div>

      <h4 style="color:white">Your order is accepted, <?=$_SESSION['name']?>!</h4>
      <h4 style="color:white">Order number is: 89034167403</h4>

    </div> <!-- /container -->
  
  </body>
</html>


<?php 


//basketten aldıklarını ->carta insert et

$a = $_SESSION['id'];

$sql_statement = "SELECT * FROM BASKET B WHERE B.customer_id = $a ";

$result = mysqli_query($db, $sql_statement);

$total_cost= 0;
$total_quantity= 0;


while($row = mysqli_fetch_assoc($result))
{ 

  $quantity = $row['quantity'];
  $cost = $row['cost'];
  $product_id = $row['product_id'];
  $total_cost = $total_cost + $cost * $quantity ;
  $total_quantity = $total_quantity + $quantity;

}


$query = "INSERT INTO CART(customer_id, product_id,total_cost ,quantity)	
					VALUES ('$a ','  $product_id', '$total_cost','$total_quantity')";
  
  mysqli_query($db, $query);
  

  $query12= "SELECT MAX(cart_id) AS K  FROM CART C WHERE C.customer_id = $a ";

  $result3 = mysqli_query($db, $query12);

  $cart_id = mysqli_fetch_assoc($result3)["K"];



  $sql_statement2 = "SELECT * FROM BASKET B WHERE B.customer_id = $a ";

  $result2 = mysqli_query($db, $sql_statement2);

  while($row2 = mysqli_fetch_assoc($result2))
{ 
  $product_id = $row2['product_id'];



$query8 = "INSERT INTO  CART_PRODUCT(cart_id, product_id)	
VALUES ('$cart_id ', '$product_id')";

mysqli_query($db, $query8);

}



//carttan aldıklarını ->ordera insert et

$query2 = "SELECT * FROM CART C WHERE C.customer_id = $a ";

$result2 = mysqli_query($db, $query2);

$timezone  = date_default_timezone_set('Europe/London');

$cart_id = 110;
$customer_id  = 110;

while($row = mysqli_fetch_assoc($result2))
{ 

  $cart_id = $row['cart_id'];
  $customer_id = $row['customer_id'];

}

$query3 = "INSERT INTO ORDERS(time, amount, status ,cart_id, customer_id, sm_id)	
VALUES (' 15:09:17 ','1', 'Preparing', '$cart_id','$customer_id' , '14')";


mysqli_query($db, $query3);


//delete basket
$a = $_SESSION['id'];

$sql_command = "DELETE FROM BASKET ";

mysqli_query($db, $sql_command);


?>
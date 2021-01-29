<?php 

include "config.php";

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
  <h4 style="color:white">Welcome <?=$_SESSION['name']?>!</h4>
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



<div class="w3-container">
  <h3 style="color:white">Cart</h3>

  <table class="w3-table-all w3-card-4">

  <tr>
<th style="color:blue">Product name</th>
<th style="color:blue">Unit Cost</th>
<th style="color:blue">Quantity</th>

  </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM BASKET";

$result = mysqli_query($db, $sql_statement);

$totalcost = 0;

while($row = mysqli_fetch_assoc($result))
{
  $customer_id = $row['customer_id'];
  $quantity = $row['quantity'];
  $product_id = $row['product_id'];
  $price = $row['cost'];
  $name = $row['product_name'];
  
  $totalcost = $totalcost + ($price * $quantity ) ;

  echo "<tr>" . "<th>" . $name . "</th>" . "<th>" . $price . "</th>"."<th>" . $quantity . "</th>" ;
}

echo "<tr>" . "<th>" . "------------------------------------------------------------------------------------" .  "</th>" ."<th>" . "------------------------------" .  "</th>"  ."<th>" . "------------------------------" .  "</th>";

echo "<tr>" . "<th>" . "Total Cost:" .  "</th>" . "<th>" . $totalcost .  "</th>"   ;

?>

  </table>

</div>

<form action="sendadmin.php" method="POST">
<select name= "product_id" >

<?php

$sql_command = "SELECT * FROM BASKET";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
  $name = $id_rows['product_name'];
  $id = $id_rows['product_id'];

  echo "<option value=$id>".$name."</option>";
  
  echo $id;
}

?>
</select>

<button>DELETE</button>
</form>




<?php


$customer_id = $_SESSION['id'];

$query = "SELECT COUNT(*) AS C FROM BASKET WHERE BASKET.customer_id = $customer_id ";

$result = mysqli_query($db, $query);
$count = mysqli_fetch_assoc($result)["C"];


if($count  == 0){


}

else{

  echo '<h3><a style="color:white" href="checkout.php">Click to Checkout</a></h3>';
}

?>





  </body>
</html>
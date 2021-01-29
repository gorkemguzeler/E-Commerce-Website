<?php


session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'coffeeshop';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style_login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <style>
      body {
        background-image: url('./images/sign in:up alternative.png');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
      }
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      tr:nth-child(even) {
        background-color: #dddddd;
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
  <h4 style="color:white">Welcome <?=$_SESSION['name']?> ID: <?=$_SESSION['id']?>!</h4>
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
                if(isset($_SESSION['loggedin']) && ($_SESSION['pm']!=0)) {
                 ?>
                 <li><a href="pm_product.php">Admin Products</a></li>
                <?php
                    }
                  ?> 
                  <?php
                if(isset($_SESSION['loggedin']) && ($_SESSION['sm']!=0)) {
                 ?>
                 <li><a href="sm_order.php">Admin Orders</a></li>
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
      
      
      
      </div>


        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div style="color:black" class="muted pull-left"><b>TRACKABLE ORDERS</b></div> 
                    <a  href= "add_pro.php"> ADD NEW PRODUCT</a>     
                </div>
                <div class="block-content collapse in">
                    <div class="span12">

                    <div>
                <strong>Products You Are Allowed to Edit  </strong>
                
                <br></br>
				<table>
                    <tr>
                      <th>PM ID</th>
						            <th>Category ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Rating</th>
                        <th>Model </th>
                        <th>Price </th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
      <?php

          include "config.php";
          $b= $_SESSION['id'];

          //$sql_statement = "SELECT * FROM ORDERS WHERE customer_id = $b ";
          $sql_statement= "SELECT * FROM CATEGORY C, PRODUCT P WHERE C.category_id=P.category_id AND C.pm_id= $b";
          $result = mysqli_query($db, $sql_statement);

         while($data = mysqli_fetch_array($result))
            {
            ?>
              <tr>
              <td><?php echo $b; ?></td>
                <td><?php echo $data['category_id']; ?></td>
                <td><?php echo $data['product_id']; ?></td>
                <td><?php echo $data['name']; ?></td> 
                <td><?php echo $data['rating']; ?></td>  
                <td><?php echo $data['model']; ?></td>  
                <td><?php echo $data['price']; ?></td>    
                <td><a href="edit_pro.php?product_id=<?php echo $data['product_id']; ?>">Edit</a></td>
                <td><a href="delete_pro.php?product_id=<?php echo $data['product_id']; ?>">Delete</a></td>
              </tr>	
            <?php
            }
            ?>
        </table>
            </div>
            <div>
            <br> </br>
		

      </div>
      
    
      </div>

  </body>
</html>
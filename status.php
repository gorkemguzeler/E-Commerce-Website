<?php
// We need to use sessions, so you should always start sessions using the below code.
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
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, first_name,last_name FROM USERS WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $first_name,$last_name);
$stmt->fetch();
$stmt->close();


//SEN YAZDIN
$stmt2 = $con->prepare('SELECT order_id, time,amount,status FROM ORDERS WHERE customer_id = ?');
// In this case we can use the account ID to get the account info.
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($order_id, $time,$amount,$status);
$stmt2->fetch();
$stmt2->close();

//SEN YAZDIN
$stmt2 = $con->prepare('SELECT phone, address,email FROM CUSTOMER WHERE customer_id = ?');
// In this case we can use the account ID to get the account info.
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($phone, $address,$email);
$stmt2->fetch();
$stmt2->close();

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
      
      
      
      </div>


        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div style="color:black" class="muted pull-left"><b>ACCOUNT INFORMATION</b></div> 
                    <?php
                if(isset($_SESSION['loggedin']) && ($_SESSION['pm']!=0 ||$_SESSION['sm']!=0 )  ) {
                 ?>
                 <a href="edit_status.php" > EDIT ADMIN INFORMATION</a>   
                <?php
                    }
                  ?>
                  <?php
                  if(isset($_SESSION['loggedin']) && ($_SESSION['pm']==0 && $_SESSION['sm']==0 )  ) {
                 ?>
                 <a href="edit_status_cust.php" > EDIT CUSTOMER INFORMATION</a>   
                <?php
                    }
                  ?>  
                           
                </div>
                <div class="block-content collapse in">
                    <div class="span12">

                    <div>
				<strong>Your account details are below</strong>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?>   </td> 
					</tr>
					<tr>
						<td>First Name:</td>
						<td><?=$first_name?></td>
          </tr>
          <tr>
						<td>Last Name:</td>
						<td><?=$last_name?></td>
          </tr>


          <?php
          if(isset($_SESSION['loggedin']) && ($_SESSION['pm']==0)&& ($_SESSION['sm']==0)) {
                 ?>
                  <tr>
						<td>Email:</td>
						<td><?=$email?></td>
          </tr>
          <tr>
						<td>Address:</td>
						<td><?=$address?></td>
          </tr>
          <tr>
						<td>Phone:</td>
						<td><?=$phone?></td>
          </tr>
                <?php
                    }
                  ?> 

         

        </table>
            <br> </br>
				<strong>Your Orders are below </strong>
				<table>
					<tr>
						  <th>Order Number</th>
              <th>Time</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Rate</th>
              <th>Comment</th>
          </tr>
          
				   	<?php

                include "config.php";
                $b= $_SESSION['id'];

                $sql_statement = "SELECT * FROM ORDERS WHERE customer_id = $b ";

                $result = mysqli_query($db, $sql_statement);

                
              while($data = mysqli_fetch_array($result))
              {
              ?>
                <tr>
                  <td><?php echo $data['order_id']; ?></td>
                  <td><?php echo $data['time']; ?></td>
                  <td><?php echo $data['amount']; ?></td> 
                  <td><?php echo $data['status']; ?></td>  
                  <?php
                  if($data['status']=='Delivered'){
                 ?>
                <td><a href="give_rate.php?order_id=<?php echo $data['order_id']; ?>">RATE</a></td>
                <td><a href="give_com.php?order_id=<?php echo $data['order_id']; ?>">COMMENT</a></td>  
                <?php
                    }
                  ?> 
                  
                </tr>	
              <?php
              }
              ?>
  
          </table>
  </body>
</html>

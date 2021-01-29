<?php
session_start();

include "config.php";

?>



<!DOCTYPE html>
<html lang="en">
  <head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container2 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

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


      <h2 style="color:white">Checkout Form</h2>

<div class="row">
  <div class="col-75">
    <div class="container2">
      <form action="after_checkout.php">
      
        <div class="row">

                <?php
                if(!isset($_SESSION['loggedin'])) {
                 ?>
                 
                   <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>


                <?php
                    }
                  ?> 
        



          <div class="col-50">
            <h3>Payment</h3>
        
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container2">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
      
      <table>
					<tr>
						  <th>Cost</th>
              <th>Quantity</th>
          </tr>
          
				   	<?php

                include "config.php";

                $sql_statement = "SELECT * FROM BASKET";

                $result = mysqli_query($db, $sql_statement);

                $total_cost = 0;


                while($row = mysqli_fetch_assoc($result))
                {
                  $cost = $row['cost'];
                  $quantity = $row['quantity'];
                  
                  $total_cost = $total_cost + ($cost*$quantity);
                
                  echo  "<tr>".
                        "<th>". $cost . "</th>".
                        "<th>". $quantity ."</th>".
                        "</tr>";
                }
                ?>
  
          </table>

      <p>Total Cost: <span class="price" style="color:black"><?php echo $total_cost; ?></span></p>
    </div>
  </div>
</div>


</body>
</html>



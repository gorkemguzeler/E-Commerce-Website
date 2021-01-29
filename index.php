<?php

include "config.php";

session_start();
if (!isset($_SESSION['loggedin'])) {
  $_SESSION['name'] = "guest";
  $_SESSION['id']=-1;
  $_SESSION['sm']=0;
  $_SESSION['pm']=0;
}

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

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style_slide.css" />
    <link rel="stylesheet" href="lightslider.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="lightslider.js"></script>



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

      <h4 style="color:white">Welcome <?=$_SESSION['name']?>!</h4>
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h3 style="color:white">Take a break, drink some coffee :)</h3>     
        
        <?php
    if(!isset($_SESSION['loggedin'])) {
    ?>
       <a class="btn btn-large btn-success" href="login.html">Sign in</a>
        <a class="btn btn-large btn-success" href="register.html">Sign up</a>
    <?php
    }
?>

      </div>

    </div> <!-- /container -->

    <ul id="autoWidth" class="card">
      <li class="item-a">
        <div class="box">
          <div class="slide-img">
            <img src="images/espressocmachinepng.png" width="100" height="200" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Espresso Machine</a>
              <span>Coffee Machine</span>
            </div>
            <a href="#" class="price">$229</a>
          </div>
        </div>
      </li>
      <li class="item-b">
        <div class="box">
          <div class="slide-img">
            <img src="images/filtercoffeemachine.png" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Filter Cofee Machine</a>
              <span>Coffee Machine</span>
            </div>
            <a href="#" class="price">$149</a>
          </div>
        </div>
      </li>
      <li class="item-c">
        <div class="box">
          <div class="slide-img">
            <img src="images/moliendo-ethiopia-lem-keffa-yoresel-kahve-1000-gr.jpg" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Ethiopia Espresso</a>
              <span>Coffee</span>
            </div>
            <a href="#" class="price">$15</a>
          </div>
        </div>
      </li>
      <li class="item-d">
        <div class="box">
          <div class="slide-img">
            <img src="images/hot-c-50.png" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Hot Chocolate</a>
              <span>Hot Chocolate</span>
            </div>
            <a href="#" class="price">$15.5</a>
          </div>
        </div>
      </li>
      <li class="item-e">
        <div class="box">
          <div class="slide-img">
            <img src="images/f-c.png" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Vanilla Flavoured Filter Coffee</a>
              <span> Coffee</span>
            </div>
            <a href="#" class="price">$19</a>
          </div>
        </div>
      </li>
      <li class="item-f">
        <div class="box">
          <div class="slide-img">
            <img src="images/t-c-150-r.png" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Roasted Turkish Coffee 150g</a>
              <span>Coffee</span>
            </div>
            <a href="#" class="price">$12</a>
          </div>
        </div>
      </li>
      <li class="item-g">
        <div class="box">
          <div class="slide-img">
            <img src="images/moliendo-kenya-aa-muranga-yoresel-kahve-1000-gr.jpg" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Kenya Espresso</a>
              <span>Coffee</span>
            </div>
            <a href="#" class="price">$15</a>
          </div>
        </div>
      </li>
      <li class="item-h">
        <div class="box">
          <div class="slide-img">
            <img src="images/t-c-250-d-r.png" alt="" />
          </div>
          <div class="detail-box">
            <div class="type">
              <a href="#">Double Roasted Turkish Coffee 150g</a>
              <span>Coffee</span>
            </div>
            <a href="#" class="price">$15</a>
          </div>
        </div>
      </li>
    </ul>
    <script type="text/javascript" src="script.js"></script>



  
  </body>
</html>

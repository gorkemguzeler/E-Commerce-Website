<?php

include "config.php";
session_start();

$product_id = $_GET['product_id']; // get id through query string
$user_id= $_SESSION["id"];
//$qry = mysqli_query($db,"SELECT * FROM PRODUCT WHERE product_id='$product_id'"); // select query

//$data = mysqli_fetch_array($qry); // fetch data

$qry_product = mysqli_query($db,"SELECT *  FROM PRODUCT P WHERE P.product_id= $product_id"); // select query


while($row = mysqli_fetch_assoc($qry_product))
      { 
      	$id = $row['product_id'];
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image_path'];
        $rating = $row['rating'];
        $model= $row['model'];
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

        <div class="row-fluid">
            <div class="span12">
                <h1><?php echo $name; ?></h1>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span8">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="row-fluid">
                                <div class="span10">
                                    <div class="main-image">
                                        <img width="400" height="200" src= <?php echo $image; ?> />
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <p>
                                <dl class="dl-horizontal">
                                  <dt>Sale Price</dt>
                                  <dd>$<?php echo $price; ?></dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Rating</dt>
                                  <dd><?php echo $rating; ?></dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Model</dt>
                                  <dd><?php echo $model; ?></dd>
                                </dl>
                            </p>
                            
                              <div class="control-group">
                              <?php echo 
                              '<form action="send_cart.php" method="POST">'.
                              '<input type="hidden" id="fname" name="name" value="'.$name.' "placeholder="Type your name"><br>'.
                              '<input type="hidden" id="fname" name="product_id" value='.$id.' placeholder="Type your name"><br>'.
                              '<input type="number" min="1" id="fname" name="quantity" placeholder="Enter Quantity"><br>'.
                              '<input type="hidden" id="fname" name="price" value='.$price.' placeholder="Type your name"><br>'.
                      "<button class=\"button2\">Add to Cart</button><br></br>"; 
                      echo "</form> ";
                              
                              ?>
                                    
                              </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="block">
                    <div class="navbar navbar-inner block-header navbar-no-padding">
                       <h3>REVIEWS </h3>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                           
                                      <?php
                                      $sql_statement_comment = "SELECT * FROM COMMENTS C , USERS U WHERE C.product_id=$product_id AND C.customer_id=U.user_id";
                                      $result_comment = mysqli_query($db, $sql_statement_comment);
                                      while($row_comment = mysqli_fetch_assoc($result_comment))
                                            { 
                                              $comment = $row_comment['text'];
                                              $name = $row_comment['username'];
                                             
                                              echo "<h4>" .$name  ."</h4>";
                                              echo $comment;
                                        
                                            }?>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
      <hr>


    </div> <!-- /container -->

  </body>
</html>

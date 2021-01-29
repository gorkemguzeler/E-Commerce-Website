<?php 

include "config.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<script src="https://d3js.org/d3.v6.min.js"></script>
<style>
  .rating {
display: inline-block;
unicode-bidi: bidi-override;
color: #888888;
font-size: 25px;
height: 25px;
width: auto;
margin: 0;
position: relative;
padding: 0;
}

.rating-upper {
color: #c52b2f;
padding: 0;
position: absolute;
z-index: 1;
display: flex;
top: 0;
left: 0;
overflow: hidden;
}

.rating-lower {
padding: 0;
display: flex;
z-index: 0;
}

  .card {
max-width: 800px;
max-height: 500px;
margin: auto;
text-align: center;
align-items: center;
font-family: arial;
background-color: white;
width: 350px;
height: 650px;
margin: 30px auto;
background: #FFFFFF;
box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
border-radius: 5px;
display: flex;
border: 1px solid black;
flex-direction: column;
width: 90%;

}


  </style>
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

<?php
      include "config.php";
                
      $sql_statement = "SELECT * FROM PRODUCT P, CATEGORY C WHERE P.category_id=C.category_id AND C.category_id = 5";

      $result = mysqli_query($db, $sql_statement);
      $count=1;
      while($row = mysqli_fetch_assoc($result))
      { 
      	$id = $row['product_id'];
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image_path'];
        $category = $row['category_name'];
        $rating = $row['rating'];

        echo "<div class=\"row-fluid\">
          			<ul class=\"thumbnails\">
          				<li class=\"span3\">
          					<div class=\"card\">
  					         	<img width=\"150\" height=\"150\" src=\"". $image. "\">
  					         	<div class=\"caption\">".
  						         	"<h3>" .$category  ."</h3>". 
  						         	"<p>" . $name . "</p>" .
                         "<p>" . $price . "$"."</p>".
                         '<a href="product_view.php?product_id=' . /* do not echo here */ $id . '">View</a><br></br>'. 
                        '<div class="rating">
                          <input id="rating_txt'. $count .'" type="hidden" value="'. $rating.' ">
                          <div class="rating-upper" id="rating'. $count .'" style="width: 0%">
                              <span>★</span>
                              <span>★</span>
                              <span>★</span>
                              <span>★</span>
                              <span>★</span>
                          </div>
                          <div class="rating-lower">
                              <span>★</span>
                              <span>★</span>
                              <span>★</span>
                              <span>★</span>
                              <span>★</span>
                          </div>
                          </div>
                          </div>'.
                          			'<form action="send_cart.php" method="POST">'.
                          			 
                                 '<input type="hidden" id="fname" name="name" value="'.$name.' "placeholder="Type your name"><br>'.
                          			 '<input type="hidden" id="fname" name="product_id" value='.$id.' placeholder="Type your name"><br>'.
                          			 '<input type="number" min="1" id="fname" name="quantity" placeholder="Enter Quantity"><br>'.
  									             '<input type="hidden" id="fname" name="price" value='.$price.' placeholder="Type your name"><br>'.
  						         	"<button class=\"button2\">Add to Cart</button><br></br>"; 
  						         
                        echo "</form> ".
  					         	"</div>".
  				         	"</li>";
                    "</ul>".
                "</div>";

                $count = $count+1;
      }
      echo '<input id="mycount" type="hidden" value="'. $count.' ">'

      ?>
      
<script>
      $(document).ready(function(){
        mycount = $("#mycount").val();
        console.log(mycount);

        for(i=0;i<mycount;i++)
        {
          var element = $('#rating' + i);
          //console.log(element);
          element2 = $('#rating_txt' + i);
          console.log(element2.val());
          element.css({
                width: (element2.val())*20 + "%"
            });
        }
            
        });


        </script>
     

    </div> 


     
  </body>
</html>
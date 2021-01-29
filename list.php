<?php 

include "config.php";

session_start();

?>


<!DOCTYPE html>
<html lang="en">
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
  max-height: 1000px;
  margin: auto;
  text-align: center;
  align-items: center;
  font-family: arial;
  background-color: white;
  width: 350px;
  height: 600px;
  margin: 30px auto;
  background: #FFFFFF;
  box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
  border-radius: 5px;
  display: flex;
  border: 1px solid black;
  flex-direction: column;
  width: 90%;

}


.sort {

  margin-top: 50px;
  margin-left: 40px;
  margin-bottom: 40px;
  text-align: left;
  font-family: arial;
  flex-direction: column;

}

.search {
 
  margin-top: 20px;
  margin-right: 40px;
  margin-bottom: 10px;
  text-align: right;
  font-family: arial;
  flex-direction: column;

}

.filter {

  margin-top: 20px;
  margin-left: 40px;
  margin-bottom: 10px;
  text-align: left;
  font-family: arial;
  flex-direction: column;
  
}


		</style>
  <head>
<!-- FILTER CSS STARTS -->



<title>Coffee House</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <style>
 
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 500px) {
    .column {
        width: 100%;
    }
}
.thumbnail img{
    max-width: 100%; /* do not stretch the bootstrap column */
}
 
.img-wrapper{
	width: 100%;
	padding-bottom: 100%; /* your aspect ratio here! */
	position: relative;
}
 
.img-wrapper img{
	position: absolute;
	top: 0; 
	bottom: 0; 
	left: 0; 
	right: 0;
	min-height: 50%;
	max-height: 100%;
	min-width:100%/* optional: if you want the smallest images to fill the .thumbnail */
}
</style>


  <!-- FILTER CSS ENDS -->
  <style>
      body {
        background-image: url('./images/sign in:up alternative.png');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
      }
      .dropdown-menu {
    z-index: 1;
    position absolute;
    display: none;
}
.nav:hover .dropdown-menu {
    display: block;
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

  <body>


<!-- SORT STARTED -->
<div  class="sort">
  <p ><a style="color:white" href="list.php?sortby=pricehilo">Price (Highest-Lowest) </a></p>
  <p ><a style="color:white" href="list.php?sortby=pricelohi">Price (Lowest-Highest)</a></p>
  <p ><a style="color:white" href="list.php?sortby=name">Alphabetical </a></p>
</div>
<!-- SORT STARTED -->



<!-- FILTER STARTED -->
<div class="filter">
 
  <form method="POST" action = "list.php?filter=true">
    <div class="row">
  
    <div class="col-sm-3">
        <div class="form-group">
            <select class="form-control" name="rating">
                <option value ="ranger">Filter Rating</option>
                <option value="range4">Bigger than and equal to 3</option>
                <option value="range5">Lower than 3</option>
            </select>
        </div>
    </div>
	    <div class="col-sm-3">
        <div class="form-group">
            <select class="form-control" name="price">
                <option value="rangep">Filter Price</option>
                <option value="range1">1$ - 20$</option>
                <option value="range2">21$ - 50$</option>
                <option value="range3">51$ - 1000$</option>
            </select>
        </div>
    </div>
	<button type="submit" class="btn btn-primary">Apply</button>
</div>
</form>
</div> 
<!-- FILTER ENDS -->

<!-- SEARCH STARTED -->
<div class="search">
	<form action="list.php" method="GET">
		<input type="string" id="fname" name="searchfor" placeholder="What are you searching for?"><br>
 	<button class="button2">Search</button>
</div> 
<!-- SEARCH ENDS -->

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


<?php
      include "config.php";

      // sort starts
              
      $sql_statement = "SELECT * FROM PRODUCT P, CATEGORY C WHERE P.category_id=C.category_id";     
      
      $result = mysqli_query($db, $sql_statement);


      $is_sort = false;

      if (isset($_GET['sortby'])) {

        // echo $_GET['sortby'] . "  ";
        
        $sortby = $_GET['sortby'];
        
        if ($sortby == 'pricehilo') {
          $result = mysqli_query($db,"SELECT * FROM PRODUCT P , CATEGORY C WHERE P.category_id=C.category_id  ORDER BY  P.price DESC");
        }
        elseif ($sortby == 'pricelohi') {
          $result = mysqli_query($db,"SELECT * FROM PRODUCT P , CATEGORY C WHERE P.category_id=C.category_id ORDER BY P.price ASC");
        }
        elseif ($sortby == 'name') {
          $result = mysqli_query($db,"SELECT * FROM PRODUCT P , CATEGORY C WHERE P.category_id=C.category_id ORDER BY P.name");
        }
        $is_sort = true;
      }

// sort ends




// filter starts
  
      error_reporting( error_reporting() & ~E_NOTICE );
      if(isset($_POST['price'])) {
        if($_POST['price']=='rangep'){
          $low = 0; $high = 1000;
        }
        elseif($_POST['price']=='range1'){
         $low = 1; $high = 20;
       }
       elseif($_POST['price']=='range2'){
         $low = 21; $high = 50;
       }
       elseif($_POST['price']=='range3'){
         $low = 51; $high = 1000;
       } 
     
     }
   
     if(isset($_POST['rating'])) {
      if($_POST['rating']=='ranger'){
        $low_r = 0; $high_r = 5;
      }
      elseif($_POST['rating']=='range4'){
      $low_r = 3; $high_r = 5;
    }
       elseif($_POST['rating']=='range5'){
      $low_r = 0; $high_r = 3;
    }
    
   }
   

   $filter = $_GET['filter'];

       $price = $_POST['price'];
       $rating = $_POST['rating'];
     
       if($filter == true){
     
       if(isset($_POST['price']) &&  isset($_POST['rating'])) { 
         $qry = "SELECT * FROM PRODUCT P, CATEGORY C
       WHERE P.category_id=C.category_id AND P.price > $low AND P.price < $high AND P.rating > $low_r AND P.rating < $high_r  "; }
   
       if(isset($_POST['price']) &&  !isset($_POST['rating'])) { 
         $qry = "SELECT * FROM PRODUCT P, CATEGORY C
       WHERE P.category_id=C.category_id AND P.price > $low AND P.price < $high "; }
   
       if(!isset($_POST['price']) &&  isset($_POST['rating'])) { 
         $qry = "SELECT * FROM PRODUCT P , CATEGORY C
         WHERE P.category_id=C.category_id AND P.rating > $low_r AND P.rating < $high_r  "; }
   
       if(!isset($_POST['price']) &&  !isset($_POST['rating'])) { 
         $qry = "SELECT * FROM PRODUCT P, CATEGORY C
         WHERE P.category_id=C.category_id"; }

         $k = mysqli_query($db,$qry);

         if($k && mysqli_num_rows($k) >= 0){
          // echo "filtera girdik";
          $result = mysqli_query($db,$qry);
      }
 }
     
// filter ends


//search starts
 if(isset($_GET['searchfor']))
 {
 	$query = $_GET["searchfor"];
    $sql_statement = "SELECT *
                    FROM PRODUCT P, CATEGORY C
                    WHERE ((P.name LIKE '%$query%') OR (P.model LIKE '%$query%') OR ( C.category_name LIKE '%$query%')) AND P.category_id = C.category_id
                  GROUP BY P.product_id";
    $result = mysqli_query($db,$sql_statement);
 }

//search ends

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
  						         	"<button class=\"button2\">Add to Cart</button>".
  						         	"</form> ".
  					         	"</div>".
  				         	"</li>";
                    "</ul>".
                "</div>";

                $count = $count+1;
      }
      echo '<input id="mycount" type="hidden" value="'. $count.' ">';


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

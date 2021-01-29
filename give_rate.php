

<?php

include "config.php"; // Using database connection file here
session_start();

$order_id = $_GET['order_id']; // get id through query string
$user_id= $_SESSION["id"];
//$qry = mysqli_query($db,"SELECT * FROM PRODUCT WHERE product_id='$product_id'"); // select query

//$data = mysqli_fetch_array($qry); // fetch data

$qry_product = mysqli_query($db,"SELECT *  FROM ORDERS O, CART_PRODUCT CA, PRODUCT P WHERE O.order_id= $order_id AND O.cart_id=CA.cart_id AND P.product_id=CA.product_id"); // select query

 // fetch data

$my_array= array();
while ($data_product = mysqli_fetch_array($qry_product))
{
  array_push($my_array,$data_product);
}
$row_num= count($my_array);





if(isset($_POST['add'])) // when click on Update button
{
    $rate = $_POST['rating'];
    $product_id= $_POST['product'];
    if (0<=$rate && $rate<=5)
    {
      $qry = mysqli_query($db,"SELECT C.product_id AS A FROM ORDERS O , CART C WHERE  O.cart_id=C.cart_id  AND O.order_id=$order_id ");
      //$product_id = mysqli_fetch_assoc($qry)["A"]; 
      
      $add = mysqli_query($db,"INSERT INTO RATES (rate,customer_id,product_id) VALUES ('$rate', '$user_id', '$product_id')");
    
      if($add )
      {
         // mysqli_close($db); // Close connection
          header("location:list.php"); // redirects to all records page
          exit;
      } 
      else {echo "You already gave rating for this product!";}
    }
    else {echo "Please rate between 0 and 5! ";}
  	
}
?>

<h3>GIVE RATING</h3>

<form method="POST">
<input id="product_id"  name="product" placeholder="Enter a Product ID "list="defaultNumbers" Required>


<datalist id="defaultNumbers">
<?php
              for ($i=0 ; $i<$row_num ;$i++)
              {
                 ?>
                 <<option value="<?php echo $my_array[$i]['product_id'] . '">' . $my_array[$i]['name']; ?>">
                
                <?php
                  }  
                  ?>

</datalist>
  <input type="float" name="rating" min="0" max="5" value="" placeholder="Enter a Rating " Required>
  <input type="submit" name="add" value="ADD">
</form>
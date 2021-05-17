<!DOCTYPE>
<?php
  include("includes/db.php");

?>


<?php

$total = 0;
$get_id = "select * from orders ORDER BY order_id DESC LIMIT 0,1";
$run_id = mysqli_query ($con,$get_id);
$row_id = mysqli_fetch_array($run_id);

$order_id = $row_id['order_id'];

$sel_price = "select * from cart";
$run_price = mysqli_query($con,$sel_price);

while ($p_price = mysqli_fetch_array($run_price)){

  $pro_id = $p_price ['product_id']; //from cart table
  $pro_qty = $p_price ['qty']; // from cart table

  //declare data from products table
  $pro_price = "select * from products where sport_id = '$pro_id'";
  $run_pro_price = mysqli_query ($con, $pro_price);

  while ($pp_price = mysqli_fetch_array($run_pro_price)){

    $sport_price = array ($pp_price ['sport_price']); //put price into $sport_price
    $sport_name = $pp_price ['sport_name'];
    $sport_image = $pp_price ['sport_image'];
    $single_price = $pp_price ['sport_price'];
    $sports_price = $single_price * $pro_qty;
    $values = array_sum ($sport_price);
    $total += $sports_price;
    $discount_price = $total * .10;
    $promotion_price = $total - $discount_price;


$delivery_details = "insert into ordersdetail (pro_id,pro_title,price,quantity,order_id) values
('$pro_id','$sport_name','$sports_price','$pro_qty','$order_id')";
$insert_detailss = mysqli_query($con,$delivery_details);
if($insert_detailss){

  $delete_cart="DELETE FROM cart";
  $run_delete=mysqli_query($con,$delete_cart);
      echo"<script>alert('Order confimed!')</script>";
        echo "<script>window.open('order.php','_self')</script>";
  }

?>

<?php }} ?>

<?php
session_start();
if (empty($_SESSION['user_email'])) {
  echo "<script>window.open('./index.php','_self')</script>";
}
include("functions/functions.php");

?>

<!DOCTYPE html>

<html>

<head>
  <title> NBC sports/cart </title>
  <link rel="stylesheet" href="./styles/payment.css" media="all" />
  <link rel="stylesheet" href="./styles/bootstrap/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="/action_page.php">

          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city">

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state">
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip">
                </div>
              </div>
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth">

              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv">
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
      <div class="container">
        <h4>Cart
          <span class="price" style="color:black">
            <i class="fa fa-shopping-cart"></i>
            <b>4</b>
          </span>
        </h4>
        <?php
        $total = 0;
        $promotion_price = 0;
        //declare data from cart table
        global $con;
        $sel_price = "select * from cart";
        $run_price = mysqli_query($con, $sel_price);
        while ($p_price = mysqli_fetch_array($run_price)) {

          $pro_id = $p_price['product_id']; //from cart table
          $pro_qty = $p_price['qty']; // from cart table

          //declare data from products table
          $pro_price = "select * from products where sport_id = '$pro_id'";
          $run_pro_price = mysqli_query($con, $pro_price);

          while ($pp_price = mysqli_fetch_array($run_pro_price)) {

            $sport_price = array($pp_price['sport_price']); //put price into $sport_price
            $sport_title = $pp_price['sport_name'];
            $sport_image = $pp_price['sport_image'];
            $single_price = $pp_price['sport_price'];
            $sports_price = $single_price * $pro_qty;
            $values = array_sum($sport_price);
            $total += $sports_price;
            $discount_price = $total * .10;
            $promotion_price = $total - $discount_price;
        ?>
            <p><a href="#"><?php echo $sport_title; ?>(<?php echo $pro_qty; ?>)</a> <span class="price"><?php echo "RM " . $sports_price; ?></span></p>
        <?php
          }
        }
        ?>
        <hr>
        <p>Total <span class="price" style="color:black"><b><?php echo "RM " . $total; ?></b></span></p>
        <p>Discount (10%) <span class="price" style="color:black"><b><?php echo "RM " . $discount_price; ?></b></span></p>
        <p>Grand Total <span class="price" style="color:black"><b><?php echo "RM " . $promotion_price; ?></b></span></p>
      </div>
    </div>
  </div>

</body>

</html>
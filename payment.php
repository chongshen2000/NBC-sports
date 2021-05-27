<?php
session_start();
if (empty($_SESSION['user_email'])) {
  echo "<script>window.open('./index.php','_self')</script>";
}
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
        <p><a href="#">Product 1</a> <span class="price">$?</span></p>
        <p><a href="#">Product 2</a> <span class="price">$?</span></p>
        <p><a href="#">Product 3</a> <span class="price">$?</span></p>
        <p><a href="#">Product 4</a> <span class="price">$?</span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
      </div>
    </div>
  </div>

</body>

</html>
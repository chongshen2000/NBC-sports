<?php
session_start();
include("functions/functions.php");
?>

<html>

<head>
  <title> NBC sports/user login </title>
  <link rel="stylesheet" href="styles/styles.css" media="all" />
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

  <!--Main Container starts here-->
  <div class="main_wrapper">

    <!--Header starts here-->
    <div class="header_wrapper">
      <a href="index.php"><img src="images/sports.jpg" style="width:1000px;height:200px">
    </div>
    <!--Header ends here-->

    <!--Navagation Bar starts here-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <a class="navbar-brand" href="index.php">Home</a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="all_products.php">All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="best_seller.php">Best Seller</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer/my_account.php">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
      </div>
      <div id="form">

        <form method="get" action="results.php" enctype="multipart/form-data" class="form-inline">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" name="user_query" aria-label="Search">
          <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" value="Search"></button>

        </form>
      </div>
    </nav>

    <!--Navagation Bar ends here-->

    <!--Contain wrapper starts here-->

    <div class="content_wrapper">
      <div class="sidebar-container">
        <ul class="sidebar-navigation">
          <div class="maincategory">Categories</div>
          <?php getCat(); ?>
        </ul>
      </div>

      <div id="content_area">


        <div id="shopping_cart">
          <span style="float:left; font-size:16px; padding:5px; line-height:30px;">
            <?php
            if (isset($_SESSION['user_email'])) {
              $u_email = $_SESSION['user_email'];
              $get_user = "select * from user where user_email = '$u_email'";
              $run_user = mysqli_query($con, $get_user);
              while ($row2 = mysqli_fetch_array($run_user)) {
                $u_name = $row2['user_name'];
                echo "<b>Welcome: </b> <b style='color:blue'>$u_name </b>";
              }
            } else {
              echo "<b>Welcome Guest! </b>";
            }
            ?>

            Total Items: <b><?php total_items(); ?> </b>
            Total Price: <b><?php total_price(); ?> </b>
          </span>

          <a href="cart.php"><img src="images/cart.png" style="width:50px;height:35px; padding-right:10; float:right"></a>

          <span style="float:right; font-size:16px; padding:5px; line-height:30px;">
            <?php
            if (!isset($_SESSION['user_email'])) {
              echo "<a href='user_login.php' style='color:blue; font-family:Comic Sans MS'> <b>  Login/Register</b></a>";
            } else {
              echo "<a href='logout.php' style='color:blue; font-family:Comic Sans MS'> <b>  Logout</b></a>";
            }
            ?>
          </span>
        </div>

        <div class="products_box">

          <form method="post" action="">

            <table width="600" align="center" bgcolor="#999999">

              <tr align="center">
                <td colspan="10">
                  <h2><b>Login Form </b></h2>
                </td>
              </tr>

              <tr>
                <td align="right"><b>Email:</b></td>
                <td><input name="email" type="email" placeholder="Enter email" pattern="[a-z0-9_]+@[a-z]+\.[a-z]{2,3}$" size="50" required /></td>
              </tr>

              <tr>
                <td align="right"><b>Password:</b></td>
                <td><input name="pass" type="password" placeholder="Enter password" size="20" required /></td>
              </tr>

              <tr align="right">
                <td colspan="2"><b><a href="admin/index.php" style="padding-right:20; text-decoration:none; color:brown">Admin?</a></b></td>
              </tr>

              <tr align="center">
                <td colspan="2"><input type="submit" name="login" value="Login" /></td>
              </tr>


            </table>

            <h3 style="float:left">Not a member yet? Register <a href="user_register.php">here</a>!<h3>

          </form>
          <br><br>
          <td colspan="2"><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
        </div>

      </div>

      <!--Contain wrapper ends here-->




    </div>
    <!--Main Container ends here-->

</body>

</html>



<?php
if (isset($_POST['login'])) {

  $u_email = $_POST['email'];
  $u_pass = $_POST['pass'];

  $sel_u = "select * from user where user_pass ='$u_pass' AND user_email = '$u_email'";
  $run_u = mysqli_query($con, $sel_u);
  $check_user = mysqli_num_rows($run_u);

  if ($check_user == 0) {

    echo "<script>alert('Password or email is incorrect,please try again!')</script>";
    exit();
  }



  $sel_cart = "select * from cart";

  $run_cart = mysqli_query($con, $sel_cart);

  $check_cart = mysqli_num_rows($run_cart);

  if ($check_user > 0 and $check_cart == 0) {

    $_SESSION['user_email'] = $u_email;
    echo "<script>alert('You logged in successfully!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  } else {
    $_SESSION['user_email'] = $u_email;
    echo "<script>alert('You logged in successfully!')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }
}
?>



</div>
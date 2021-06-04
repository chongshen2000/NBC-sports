<!DOCTYPE html>
<?php
session_start();
include("./includes/db.php");
include("../functions/functions.php");
?>

<html>

<head>
  <title> NBC sports/my account </title>
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
      <a class="navbar-brand" href="../index.php">Home</a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="../all_products.php">All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../best_seller.php">Best Seller</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my_account.php">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cart.php">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact Us</a>
          </li>
        </ul>
      </div>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    <!--Navagation Bar ends here-->

    <!--Contain wrapper starts here-->
    <div class="content_wrapper">
      <div class="sidebar-container">
        <ul class="sidebar-navigation">
          <div class="maincategory">My account</div>






          <?php
          if (isset($_SESSION['user_email'])) {

            $user = $_SESSION['user_email'];
            $get_img = "select * from user where user_email='$user'";
            $run_img = mysqli_query($con, $get_img);
            $row_img = mysqli_fetch_array($run_img);
            $u_image = $row_img['user_image'];
            $u_name = $row_img['user_name'];

            echo "<p style='text-align:center;'><img src='user_images/$u_image' width = '150' height='150' border='2px solid black' />";
          } else {
            echo "<script>alert('Log in to view My Account!')</script>";
            echo "<script>window.open('../user_login.php','_self')</script>";
          }
          ?>


          <li><a href="my_account.php?my_orders">My Orders</a></li>
          <li><a href="my_account.php?edit_image">Edit Profile Image</a></li>
          <li><a href="my_account.php?edit_account">Edit Account</a></li>
          <li><a href="my_account.php?change_pass">Change Password</a></li>
          <!-- <li><a href="my_account.php?delete_account">Delete Account</a></li> -->
          <li><a href="../logout.php">Logout</a></li>
        </ul>


      </div>

      <div id="content_area">

        <div id="shopping_cart">
          <span style="color: black;float:left; font-size:16px; padding:5px; line-height:30px;">
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

          <a href="../cart.php"><img src="../images/cart.png" style="width:50px;height:35px; padding-right:10; float:right"></a>

          <span style="float:right; font-size:16px; padding:5px; line-height:30px;">
            <?php
            if (!isset($_SESSION['user_email'])) {
              echo "<a href='user_login.php' style='color:blue; font-family:Comic Sans MS'> <b>  Login/Register</b></a>";
            } else {
              echo "<a href='../logout.php' style='color:blue; font-family:Comic Sans MS'> <b>  Logout</b></a>";
            }
            ?>
          </span>
        </div>


        <div class="products_box">


          <?php
          if (!isset($_GET['my_orders'])) {
            if (!isset($_GET['edit_account'])) {
              if (!isset($_GET['edit_image'])) {
                if (!isset($_GET['change_pass'])) {
                  if (!isset($_GET['delete_account'])) {

                    echo "
              <h2 style='padding:10px; text-align:center;'>Welcome: $u_name</h2>
            <h3 style='text-align:center;'> You can view your order progress by clicking this <a href='my_account.php?my_orders'>link</a></h3>";
                  }
                }
              }
            }
          }
          ?>

          <?php
          if (isset($_GET['edit_account'])) {
            include("edit_account.php");
          }

          if (isset($_GET['edit_image'])) {
            include("edit_image.php");
          }

          if (isset($_GET['change_pass'])) {
            include("change_pass.php");
          }

          if (isset($_GET['delete_account'])) {
            include("delete_account.php");
          }

          if (isset($_GET['my_orders'])) {
            include("my_orders.php");
          }
          ?>



        </div>

      </div>
      <!--Contain wrapper ends here-->



    </div>
    <!--Main Container ends here-->

</body>

</html>
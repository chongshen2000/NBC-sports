<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>

<html>

<head>
  <title> Lux Restaurant </title>
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
      <a href="index.php"><img src="images/1.jpg" style="width:1000px;height:200px">
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
        <!-- add item into cart -->
        <?php cart(); ?>


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

          <?php
          if (isset($_GET['search'])) {

            $search_query = $_GET['user_query'];

            $get_pro = "select * from products where sport_name like'%$search_query%'";

            $run_pro = mysqli_query($con, $get_pro);

            while ($row_pro = mysqli_fetch_array($run_pro)) {
              //use msql name
              $pro_id = $row_pro['sport_id'];
              $pro_title = $row_pro['sport_name'];
              $pro_image = $row_pro['sport_image'];
              $pro_price = $row_pro['sport_price'];
              $pro_cat = $row_pro['sport_category'];

              echo "
            		<div id= 'single_product'>
            			<img src='admin/product_images/$pro_image'width='150'height='170' />
            			 <a href='details.php?pro_id=$pro_id'> <p>$pro_title</p></a>
            			<p><b> RM $pro_price </b></p>
            			<a href='index.php?add_cart=$pro_id'><button style ='float:right;' > Add to Cart</button></a>
            		</div>";
            }
          }
          ?>

        </div>
        <a href='index.php?pro_id=$pro_id' style="float:right; padding-right:10px;"> back</a>

      </div>
      <!--Contain wrapper ends here-->






    </div>
    <!--Main Container ends here-->



</body>






</html>
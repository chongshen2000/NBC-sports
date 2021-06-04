<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>

<html>

<head>
  <title> NBC sports/cart </title>
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

      <!--Contain wrapper ends here-->

      <div id="content_area">

        <div id="shopping_cart">
          <span style="color: black;float:left; font-size:16px; padding:5px; line-height:30px; color: black;">
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
          <br>
          <form action="" method="post" enctype="multipart/form-data">
            <table align="center" width="700" bgcolor="powderblue">

              <tr align="center">
                <th>Remove</th>
                <th>Products(S)</th>
                <th>Quantity</th>
                <th>Single Price</th>
                <th>Total Price</th>
              </tr>

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


                  <tr align="center">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
                    <td><input type="hidden" name="update[]" value="<?php echo $pro_id; ?>" /><?php echo $sport_title; ?><br><img src="admin/product_images/<?php echo $sport_image; ?>" width="100" height="150" />
                    </td>
                    <td><input type="number" value="<?php echo $pro_qty; ?>" size="4" name="quantity[]" min="1" max="100" /></td>
                    <td><?php echo "RM " . $single_price; ?></td>
                    <td><?php echo "RM " . $sports_price; ?></td>
                  </tr>

              <?php }
              } ?>

              <tr align="right">
                <td colspan="4"><b>Sub Total:</b></td>
                <td><?php echo "RM " . $total; ?></td>
              </tr>

              <tr align="right">
                <td colspan="4"><b>Promotion Price(10%):</b></td>
                <td><?php echo "RM " . $promotion_price; ?></td>
              </tr>


              <tr align="center">
                <td><input type="submit" name="remove_pro" value="Remove" /></td>
                <td><input type="submit" name="continue" value="Continue Shopping" /></td>
                <td><input type="submit" name="update_cart" value="Update quantity" /></td>
                <?php
                $query = "select * from cart";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                ?>
                  <td colspan="2"><button><a href="./payment.php" style="text-decoration:none;">Checkout</a></button></td>
                <?php
                }
                ?>
              </tr>

            </table>

            <!-- update quatity -->
            <?php

            global $con;

            if (isset($_POST['update_cart'])) {

              foreach ($_POST['update'] as  $key => $update_id) { //loop for 2 parameter
                $qtyy = $_POST['quantity'][$key];
                $update_product = "update cart set qty='$qtyy' where product_id='$update_id'";
                $run_update = mysqli_query($con, $update_product);

                if ($run_update) {

                  echo "<script>alert('Quantity of product is updated successfully!')</script>";
                  echo "<script>window.open('cart.php','_self')</script>";
                }
              }
            }


            //update the cart(remove)
            //function removecart(){ //changed
            global $con;

            if (isset($_POST['remove_pro'])) {
              if (!empty($_POST['remove'])) {

                foreach ($_POST['remove'] as $remove_id) {
                  $delete_product = "delete from cart where product_id ='$remove_id' ";
                  $run_delete = mysqli_query($con, $delete_product);
                  if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                  }
                }
              }
            }


            if (isset($_POST['continue'])) {
              echo "<script>window.open('index.php','_self')</script>";
            }
            ?>

        </div>
      </div>


      <!--Contain wrapper ends here-->




    </div>
    <!--Main Container ends here-->



</body>



</html>
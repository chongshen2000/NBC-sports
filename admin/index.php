<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
  // echo "<script>window.open('login.php?not_amin=You are not an Admin!','_self')</script>";
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <!DOCTYPE>

  <html>

  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles/styles.css" media="all" />
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="main_wrapper">

      <div class="header_wrapper">
        <a href="index.php"><img src="images/sports.jpg" style="width:1000px;height:200px">
      </div>

      <div class="content_wrapper">

        <ul class="sidebar-navigation">


          <div id="right">
            <div class="maincategory">Manage content</div>
            <a href="index.php?insert_product">Insert New Product</a>
            </li>
            <a href="index.php?view_products">View All Products</a>
            <a href="index.php?insert_cats">Insert New Category</a>
            <a href="index.php?view_cats">View All Categories</a>
            <a href="index.php?view_customers">View Customers</a>
            <a href="index.php?view_orders">View Orders</a>
            <a href="index.php?view_report">View Reports</a>
            <a href="logout.php?">Admin Logout</a>

          </div>
          <br></br>
          <h2 style="color:violet; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>


          <div class="products_box">


            <?php
            if (!isset($_GET['insert_product'])) {
              if (!isset($_GET['view_products'])) {
                if (!isset($_GET['edit_pro'])) {
                  if (!isset($_GET['insert_cats'])) {
                    if (!isset($_GET['view_cats'])) {
                      if (!isset($_GET['edit_cats'])) {
                        if (!isset($_GET['view_customers'])) {
                          if (!isset($_GET['view_report'])) {
                            if (!isset($_GET['view_orders'])) {
                              if (!isset($_GET['edit_order'])) {
                                if (!isset($_GET['hide_pro'])) {
                                  if (!isset($_GET['unhide_pro'])) {


                                    echo "
        <h2 style='padding:10px; text-align:center; color:violet'>Welcome Admin!</h2>";
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
            ?>

            <?php
            if (isset($_GET['insert_product'])) {
              include("insert_product.php");
            }

            if (isset($_GET['view_products'])) {
              include("view_products.php");
            }

            if (isset($_GET['edit_pro'])) {
              include("edit_pro.php");
            }

            if (isset($_GET['insert_cats'])) {
              include("insert_cats.php");
            }

            if (isset($_GET['view_cats'])) {
              include("view_cats.php");
            }

            if (isset($_GET['edit_cats'])) {
              include("edit_cats.php");
            }

            if (isset($_GET['view_customers'])) {
              include("view_customers.php");
            }

            if (isset($_GET['view_report'])) {

              include("view_report.php");
            }


            if (isset($_GET['view_orders'])) {

              include("view_orders.php");
            }

            if (isset($_GET['edit_order'])) {

              include("edit_order.php");
            }

            if (isset($_GET['hide_pro'])) {

              include("hide_pro.php");
            }
            if (isset($_GET['unhide_pro'])) {

              include("unhide_pro.php");
            }



            ?>



          </div>

  </body>

  </html>

<?php } ?>
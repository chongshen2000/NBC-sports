<!DOCTYPE>
<?php
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php?not_amin=You are not an Admin!','_self')</script>";
} else {

?>


  <html>

  <head>
    <title>Inserting Product</title>

  </head>

  <body bgcolor="skyblue">

    <form action="" method="post" enctype="multipart/form-data">

      <table align="center" width="790" border="2" bgcolor="skyblue">

        <tr align="center">
          <td colspan="10">
            <h2>Insert New Product Here </h2>
          </td>
        </tr>

        <tr>
          <td align="right"><b>Product Name:</b></td>
          <td><input type="text" name="product_name" size="50" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Image:</b></td>
          <td><input type="file" name="product_image" /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Price:</b></td>
          <td><input type="text" name="product_price" pattern="[0-9.]{1,6}" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Description:</b></td>
          <td><textarea name="product_description" cols="50" rows="10"></textarea></td>
        </tr>

        <tr>
          <td align="right"><b>Product Category:</b></td>
          <td>
            <select name="product_cat" required>
              <option>Select a Category</option>
              <?php

              $get_cat = "select * from category";
              $run_cat = mysqli_query($con, $get_cat);

              while ($row_cat = mysqli_fetch_array($run_cat)) {

                $cat_id = $row_cat['cat_id'];
                $cat_title = $row_cat['cat_title'];


                echo "<option value='$cat_id'>$cat_title</option>";
              }

              ?>
            </select>

          </td>
        </tr>





        <tr align="center">
          <td colspan="10"><input type="submit" name="insert_post" value="Insert Product Now" /></td>
        </tr>

      </table>
      <td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>

    </form>

  </body>

  </html>

  <?php
  if (isset($_POST['insert_post'])) {

    //getting the text data from the fields
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_cat = $_POST['product_cat'];


    //getting the image from the field
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp, "product_images/$product_image");

    $insert_product = "insert into products (sport_name,description,sport_category,sport_price,sport_image) values
    ('$product_name','$product_description','$product_cat','$product_price','$product_image')";

    $insert_pro = mysqli_query($con, $insert_product);
    if ($insert_pro) {

      echo "<script>alert('Product has been inserted!')</script>";
      echo "<script>window.open('index.php?insert_product','_self')</script>";
    }
  }



  ?>

<?php } ?>
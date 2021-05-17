<form action="" method="post" style="padding" >

              <table width ="600" align="center" bgcolor="skyblue">

                <tr>
                  <td align="right"><h3><b>Insert New Category:</b></h3></td>
                  <td><input name="new_cat" type="text" placeholder="Enter new category" size="40" pattern="[A-Za-z&\s,.-]{0,100}" required /></td>
                </tr>

                <br></br>

                <tr align="center" style="padding:20">
                  <td colspan="2"><input type="submit" name="add_cat" value="Add Category" /></td>
                </tr>

              </table>

              <td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>

</form>

<?php
include("includes/db.php");
  if(isset($_POST['add_cat'])){
  $new_cat = $_POST['new_cat'];

  $insert_cat = "insert into category (cat_title) values ('$new_cat')";

  $run_cat = mysqli_query($con,$insert_cat);

  if($run_cat){
    echo "<script>alert('New Category has been inserted!')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
  }
}


 ?>

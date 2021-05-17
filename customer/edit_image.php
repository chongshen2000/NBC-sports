<?php
include("includes/db.php");
$user = $_SESSION ['user_email'];
$get_user = "select * from user where user_email='$user'";
$run_user = mysqli_query ($con,$get_user);
$row_user = mysqli_fetch_array($run_user);

$u_id = $row_user['user_id'];
$name = $row_user['user_name'];
$email = $row_user['user_email'];
$image = $row_user['user_image'];

?>

<form action="" align="center" method="post" enctype="multipart/form-data">

  <table width ="730" align="center" border="2" bgcolor="LavenderBlush">

      <tr align="center">
        <td colspan="10"><h2 style='font-family:Comic Sans MS; color:brown;'>Change your profile picture </h2></td>
      </tr>

      <tr>
        <?php
      echo "
        <h2 style='padding:10px; text-align:left;'>Welcome: $name</h2>"
        ?>
      </tr>

      <tr>
        <td style="padding:20px;" align="right"><b>Image:</b></td>
        <td><input type="file" name="u_image"/><img src="user_images/<?php echo $image;?>"
        width="400" height="450"/></td>
      </tr>



      <tr align="center">
        <td colspan="10"><input type="submit" name="update_image" value="Update" /></td>
      </tr>

    </table>



</form>

<br>
<td align="center" colspan="1"><button><a href="my_account.php" style="text-decoration:none;">Back</a></button></td>

<?php
  if(isset($_POST['update_image'])){

    $user_id = $u_id;
    $u_name = $_POST['u_name'];
    $u_image = $_FILES['u_image']['name'];
    $u_image_tmp = $_FILES['u_image']['tmp_name'];

    move_uploaded_file($u_image_tmp,"user_images/$u_image");

    $update_u = "update user set user_image='$u_image' where user_id ='$user_id' ";

    $run_update = mysqli_query($con,$update_u);

    if($run_update){
      echo "<script>alert('Your image have been updated successfully!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";

    }



  }
 ?>

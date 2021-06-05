<?php
include("includes/db.php");
$user = $_SESSION ['user_email'];
$get_user = "select * from user where user_email='$user'";
$run_user = mysqli_query ($con,$get_user);
$row_user = mysqli_fetch_array($run_user);

$u_id = $row_user['user_id'];
$name = $row_user['user_name'];
$email = $row_user['user_email'];
$password = $row_user['user_pass'];
$password2 = $row_user['user_pass2'];
$address = $row_user['user_address'];
$state = $row_user['user_state'];
$contact = $row_user['user_contact'];
$image = $row_user['user_image'];

?>

<form action="" method="post" enctype="multipart/form-data">

  <table width ="600" align="center" border="2" bgcolor="LavenderBlush">

      <tr align="center">
        <td colspan="5"><h2>Update your account </h2></td>
      </tr>

      <tr>
        <td align="right"><b>Name:</b></td>
        <td><input type="text" name="u_name" value="<?php echo $name;?>" pattern="[A-Za-z\s.,]{0,25}" required/></td>
      </tr>

      <tr>
        <td align="right"><b>Email:</b></td>
        <td><input type="email" name="u_email" size="40" value="<?php echo $email;?>" required/></td>
      </tr>

      <tr>
        <td align="right"><b>Address:</b></td>
        <td><input type="text" name="u_address" value="<?php echo $address;?>" required></td>
      </tr>

      <tr>
        <td align="right"><b>State:</b></td>
        <td>
          <select name="u_state" >
            <option><?php echo $state;?></option>
            <option>Perlis</option>
            <option>Kedah</option>
            <option>Selangor</option>
            <option>Kuala Lumpur</option>
            <option>Johor</option>
            <option>Pahang</option>
            <option>Perak</option>
            <option>Penang</option>
            <option>Negeri Sembilan</option>
            <option>Malacca</option>
            <option>Terengganu</option>
            <option>Kelantan</option>
            <option>Sabah</option>
            <option>Sarawak</option>

          </select>
        </td>
      </tr>

      <tr>
        <td align="right"><b>Contact:</b></td>
        <td><input type="text" name="u_contact" placeholder="Eg:0122345678" pattern="[0]{1}[1]{1}[0-9]{8,9}" value="<?php echo $contact;?>" required /></td>
      </tr>




      <tr align="center">
        <td colspan="5"><input type="submit" name="update" value="Update Account" /></td>
      </tr>

    </table>



</form>
<br>
<td align="center" colspan="1"><button><a href="my_account.php" style="text-decoration:none;">Back</a></button></td>





<?php
  if(isset($_POST['update'])){

    $user_id = $u_id;
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_address = $_POST['u_address'];
    $u_contact = $_POST['u_contact'];

    $update_u = "update user set user_name='$u_name', user_email='$u_email',user_address='$u_address',
    user_contact='$u_contact' where user_id ='$user_id' ";

    $run_update = mysqli_query($con,$update_u);

    if($run_update){
      echo "<script>alert('Your account have been updated successfully!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";

    }



  }
 ?>

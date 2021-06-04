<form method="post" action="">

  <table width="600" align="center" bgcolor="LavenderBlush">

    <tr align="center">
      <td colspan="10">
        <h2><b>Change Your Password </b></h2>
      </td>
    </tr>

    <tr>
      <td align="right"><b>Enter Current Password:</b></td>
      <td><input name="current_pass" type="password" minlength="15" placeholder="minimum 15 characters" required /></td>
    </tr>

    <tr>
      <td align="right"><b>Enter New Password:</b></td>
      <td><input name="new_pass" type="password" minlength="15" placeholder="minimum 15 characters" required /></td>
    </tr>

    <tr>
      <td align="right"><b>Re-confirm new password:</b></td>
      <td><input name="new_pass_again" type="password" minlength="15" placeholder="minimum 15 characters" required /></td>
    </tr>

    <tr align="center">
      <td colspan="2"><input type="submit" name="change_pass" value="Change Password" /></td>
    </tr>

  </table>

</form>

<br>
<td align="center" colspan="1"><button><a href="my_account.php" style="text-decoration:none;">Back</a></button></td>

<?php
include("includes/db.php");

if (isset($_POST['change_pass'])) {
  if ($_POST['current_pass'] == $_POST['new_pass']) {
    echo "<script>alert('New password cannot be same with current password!')</script>";
    echo "<script>window.open('my_account.php?change_pass','_self')</script>";
    exit();
  } else {


    $user = $_SESSION['user_email'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];

    $sel_pass = " select * from user where user_pass = '$current_pass' AND user_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);
    $check_pass = mysqli_num_rows($run_pass);

    if ($check_pass == 0) {

      echo "<script>alert('Your current password is wrong!')</script>";
      exit();
    }

    if ($new_pass != $new_pass_again) {
      echo "<script>alert('New password do not match!')</script>";
      exit();
    } else {
      $update_pass = "update user set user_pass='$new_pass',user_pass2 ='$new_pass'
      where user_email='$user'";

      $run_update = mysqli_query($con, $update_pass);
      echo "<script>alert('Your password was updated successfully!')</script>";
      echo "<script>window.open('my_account.php','_self')</script>";
    }
  }
}
?>
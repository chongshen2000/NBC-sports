<?php
session_start();

include("includes/db.php");
if (isset($_POST['admin_login'])) {
  $email = $_POST['admin_email'];
  $password = $_POST['admin_pass'];

  $sel_user = "select * from admin where admin_email='$email' AND admin_pass ='$password'";
  $run_user = mysqli_query($con, $sel_user);

  $check_user = mysqli_num_rows($run_user);
  if ($check_user == 0) {

    echo "<script>alert('Password or email is incorrect,please try again!')</script>";
  } else {
    $_SESSION['admin_email'] = $email;
    echo "<script>alert('You logged in successfully!')</script>";
    echo "<script>window.location.href='index.php?logged_in=You have successfully Logged in!'</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<style>
  body {
    background-image: url("../images/background.jfif");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
</style>

<body>

  <head>
    <title>Login Form</title>

  </head>
  <form method="post" action="">

    <table width="600" align="center" bgcolor="#00bfff">

      <tr align="center">
        <td colspan="10">
          <h2><b>Admin Login </b></h2>
        </td>
      </tr>

      <tr>
        <td align="right"><b>Email:</b></td>
        <td><input name="admin_email" type="email" placeholder="Enter email" min="10" required /></td>
      </tr>

      <tr>
        <td align="right"><b>Password:</b></td>
        <td><input name="admin_pass" type="password" placeholder="Enter password" min="8" required /></td>
      </tr>


      <tr align="center">
        <td colspan="2"><input type="submit" name="admin_login" value="Log in" /></td>
      </tr>


    </table>

  </form>

</body>

</html>
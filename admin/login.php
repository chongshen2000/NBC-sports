<?php
session_start();
 ?>

<!DOCTYPE>
<html>
<body background="images/maxresdefault.jpg">

  <head>
    <title>Login Form</title>
  </head>





  <form method="post" action="login.php">

    <table width ="600" align="center" bgcolor="#00bfff">

      <tr align="center">
        <td colspan="10"><h2><b>Admin Login </b></h2></td>
      </tr>

      <tr>
        <td align="right"><b>Email:</b></td>
        <td><input name="admin_email" type="email" placeholder="Enter email" size="40" required/></td>
      </tr>

      <tr>
        <td align="right"><b>Password:</b></td>
        <td><input name="admin_pass" type="password" placeholder="Enter password" size="20" required/></td>
      </tr>


      <tr align="center">
        <td colspan="2"><button><input type="submit" name="admin_login" value="Log in" /></button></td>
      </tr>


    </table>

  </form>

  </body>

</html>

<?php

include("includes/db.php");
if(isset($_POST['admin_login'])){
  $email = $_POST['admin_email'];
  $password = $_POST['admin_pass'];

  $sel_user = "select * from admin where admin_email='$email' AND admin_pass ='$password'";
  $run_user = mysqli_query($con, $sel_user);

  $check_user = mysqli_num_rows($run_user);
  if($check_user==0){

       echo"<script>alert('Password or email is incorrect,please try again!')</script>";
       exit();
     }

     else{
       $_SESSION['admin_email'] = $email;
       echo "<script>alert('You logged in successfully!')</script>";
         echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";

     }

}
 ?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<table width="790" align="center" bgcolor="skyblue">





<tr align="center">
  <td colspan="7"><h1>View All Customers Here</h1></td>
</tr>


  <tr align="center" style="font-size:24" bgcolor="blue" >
    <th>S.N</th>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Password</th>
    <th>Contact</th>
    <th>Delete</th>
  </tr>



<?php
include("includes/db.php");
$get_u = "select * from user";
$run_u = mysqli_query($con, $get_u);

$i = 0;

while ($row_u= mysqli_fetch_array($run_u)){

  $u_id = $row_u['user_id'];
  $u_name = $row_u['user_name'];
  $u_email = $row_u['user_email'];
  $u_pass = $row_u['user_pass'];
  $u_contact = $row_u['user_contact'];
  $u_image = $row_u['user_image'];
  $i++;

 ?>

<tr align="center" style="font-size:20">
  <td><?php echo $i;?></td>
  <td><?php echo $u_name;?></td>
  <td><?php echo $u_email;?></td>
  <td><img src="../customer/user_images/<?php echo $u_image;?>" width="60" height="60"/></td>
  <td><?php echo $u_pass;?></td>
  <td><?php echo $u_contact;?></td>
  <td><a href="delete_u.php?delete_u=<?php echo $u_id;?>">Delete</a></td>
</tr>

<?php } ?>



</table>
<br>
<td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

<?php
include("includes/db.php");
if(isset($_GET['delete_u'])){
  echo "<script>window.open('delete_u','_self')</script>";
}

  ?>

</body>
</html>

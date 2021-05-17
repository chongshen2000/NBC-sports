<!DOCTYPE html>
<html>
<head>
</head>
<body>

<table width="790" align="center" bgcolor="skyblue">

<tr align="center">
  <td colspan="4"><h1>View All Category Here</h1></td>
</tr>

  <tr align="center" style="font-size:24" bgcolor="blue" >
    <th>Category ID</th>
    <th>Category Title</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>


<?php
include("includes/db.php");
$get_cat = "select * from category order by cat_id";
$run_cat = mysqli_query($con, $get_cat);

$i = 0;

while ($row_cat = mysqli_fetch_array($run_cat)){

  $cat_id = $row_cat['cat_id'];
  $cat_title = $row_cat['cat_title'];
  $i++;

 ?>

<tr align="center" style="font-size:20">
  <td><?php echo $i;?></td>
  <td><?php echo $cat_title;?></td>
  <td><a href="index.php?edit_cats=<?php echo $cat_id;?>">Edit</a></td>
  <td><a href="delete_cats.php?delete_cats=<?php echo $cat_id;?>">Delete</a></td>
</tr>

<?php } ?>



</table>

<br>
<td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

<?php
include("includes/db.php");
if(isset($_GET['delete_cats'])){
  echo "<script>window.open('delete_cats','_self')</script>";
}
  ?>

</body>
</html>

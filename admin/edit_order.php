<?php
include("includes/db.php");

if (isset($_GET['edit_order'])) {

  $order_id = $_GET['edit_order'];

  $get_order = "select * from ordersdetail where order_id='$order_id'";

  $run_order = mysqli_query($con, $get_order);

  $row_order = mysqli_fetch_array($run_order);

  $order_id = $row_order['order_id'];
  $status = $row_order['status'];
}
?>


<form action="" method="post">



  <table width="600" align="center" bgcolor="skyblue">

    <tr>
      <td align="right">
        <h3><b>Order ID = <?php echo $order_id; ?></b></h3>
      <td>


      <td align="right">
        <h3><b>Edit Status:</b></h3>
      </td>
      <td><select name="edit_status">
          <option><?php echo $status; ?></option>"
          <option>process</option>
          <option>completed</option>
      </td>
    </tr>



    <br></br>

    <tr align="center" style="padding:20">
      <td colspan="4"><input type="submit" name="update_status" value="Update status" /></td>
    </tr>

  </table>

</form>
<br>
<td><button><a href="index.php?view_orders" style="text-decoration:none;">Back</a></button></td>
<br><br><br><br></br>

<?php
include("includes/db.php");
if (isset($_POST['update_status'])) {

  $update_id = $order_id;

  $edit_status = $_POST['edit_status'];

  $update_status = "update ordersdetail set status='$edit_status' where order_id='$order_id'";

  $run_status = mysqli_query($con, $update_status);

  if ($run_status) {
    echo "<script>alert('The status has been updated!')</script>";
    echo "<script>window.open('index.php?view_orders','_self')</script>";
  }
}


?>

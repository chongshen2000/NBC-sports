<!DOCTYPE html>
<html>

<head>

</head>

<body>

  <table width="780" align="center" bgcolor="skyblue">
    <tr align="center">
      <td colspan="7">
        <h1 style="font-family:Comic Sans MS; color:brown;">View All Orders Here</h1>
      </td>
    </tr>

    <div>
      <tr align="center" style="font-size:24" bgcolor="blue">
        <th>ID</th>
        <th>Order Reference</th>
        <th>Date</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>delete</th>
      </tr>
    </div>


    <?php
    include("includes/db.php");
    $get_pro = "select * from orders order by date desc";
    $run_pro = mysqli_query($con, $get_pro);

    $i = 0;

    while ($row_pro = mysqli_fetch_array($run_pro)) {
      $date = $row_pro['date'];
      $order_id = $row_pro['order_id'];
      $order_reference = $row_pro['order_reference'];
      $total_price = $row_pro['total_price'];

      $get_proo = "select * from ordersdetail where order_id='$order_id'";
      $run_proo = mysqli_query($con, $get_proo);
      $row_proo = mysqli_fetch_array($run_proo);
      $status = $row_proo['status'];


    ?>

      <tr align="center" style="font-size:20">
        <td><?php echo $order_id; ?></td>

        <td><a href="view_orderdetails.php?order_id=<?php echo $order_id; ?>"> <?php echo $order_reference; ?></a></td>
        <td><?php echo $date; ?></td>
        <td>RM<?php echo $total_price; ?></td>
        <td><?php echo $status; ?></td>
        <td><a href="index.php?edit_order=<?php echo $order_id; ?>">Edit</a></td>
        <td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">delete</a></td>
      </tr>

    <?php } ?>



  </table>

  <br>
  <td><button><a href="index.php" style="text-decoration:none;">Back</a></button></td>
  <br><br><br><br></br>

  <?php
  include("includes/db.php");
  if (isset($_GET['delete_order'])) {
    echo "<script>window.open('delete_order','_self')</script>";
  }
  ?>

</body>

</html>

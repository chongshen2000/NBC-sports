<br><br><br></br>

<form method="post" action="">

  <table width ="600" align="center" bgcolor="skyblue">

    <tr align="center">
      <td colspan="10"><h2><b>DELETE this order </b></h2></td>
    </tr>

    <tr align="center">
      <td colspan="10"><h2><b>Are you sure? </b></h2></td>
    </tr>

    <tr align="center">
    <td> <input name="yes" type="submit" value="Yes" />
      </td>
    </tr>



    <tr align="center">
    <td> <input name="no" type="submit" value="No" />

    </td>
    </tr>


  </table>

</form>


<?php

include("includes/db.php");
if(isset($_GET['delete_order'])){

  $delete_id = $_GET['delete_order'];

  if(isset($_POST['yes'])){

  $delete_pro = "delete from orders where order_id = '$delete_id'";
  $run_delete = mysqli_query($con,$delete_pro);

  $delete_orders = "delete from ordersdetail where order_id = '$delete_id'";
  $run_delete_or = mysqli_query($con,$delete_orders);

  if($run_delete_or){
    echo "<script>alert('The order has been deleted!')</script>";
    echo "<script>window.open('index.php?view_orders','_self')</script>";
  }
}

if(isset($_POST['no'])){

echo "<script>alert('Thanks!')</script>";
echo "<script>window.open('index.php?view_orders','_self')</script>";
}


}
 ?>

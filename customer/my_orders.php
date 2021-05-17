<html>

              <table width="750" align="center" bgcolor="LavenderBlush" >

              <tr align="center">
                <td colspan="6"><h2>View Orders Here</h2></td>
              </tr>

              <div class="scrollmenu">
                <tr align="center" bgcolor="#ffccff">
                  <th>Order Reference</th>
                  <th>Date</th>
                  <th>Total Price</th>
                  <th>Status</th>

                </tr>
              </div>


              <?php
              include("includes/db.php");
              $user = $_SESSION ['user_email'];
              $get_user = "select * from user where user_email='$user'";
              $run_user = mysqli_query ($con,$get_user);
              $row_user = mysqli_fetch_array($run_user);

              $u_id = $row_user['user_id'];

              $get_pro = "select * from orders where user_id=$u_id";
              $run_pro = mysqli_query($con, $get_pro);
              $count = mysqli_num_rows($run_pro);


              if($count==0){
                echo "<h2 align='center' style='padding:20px; color:blue'>* There is no result. *</h2>";

              }



              while ($row_pro = mysqli_fetch_array($run_pro)){
                $date = $row_pro['date'];
                $order_id = $row_pro['order_id'];
                $order_reference = $row_pro['order_reference'];
                $total_price = $row_pro['total_price'];

                $get_proo = "select * from ordersdetail where order_id='$order_id'";
                $run_proo = mysqli_query($con, $get_proo);
                $row_proo = mysqli_fetch_array($run_proo);
                  $status = $row_proo['status'];


          ?>

              <tr align="center">

                <td><a href="view_orders.php?order_id=<?php echo $order_id;?>"> <?php echo $order_reference;?></a></td>
                <td><?php echo $date;?></td>
                <td>RM<?php echo $total_price;?></td>
                <td><?php echo $status;?></td>


              </tr>

              <?php } ?>

              </table>

              <br>
              <td align="center" colspan="1"><button><a href="my_account.php" style="text-decoration:none;">Back</a></button></td>

              </html>

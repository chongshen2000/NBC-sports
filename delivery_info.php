<!DOCTYPE>
<?php
include("includes/db.php");


$user = $_SESSION ['user_email'];
$get_user = "select * from user where user_email='$user'";
$run_user = mysqli_query ($con,$get_user);
$row_user = mysqli_fetch_array($run_user);

$u_id = $row_user['user_id'];
$name = $row_user['user_name'];
$email = $row_user['user_email'];
$address = $row_user['user_address'];
$state = $row_user['user_state'];
$contact = $row_user['user_contact'];


?>


<form action="" method="post">

  <table width ="750" align="center" border="2" bgcolor="LavenderBlush">

      <tr align="center">
        <td colspan="10"><h2>Delivery details </h2></td>
      </tr>

      <tr>
        <td align="right"><b>Name:</b></td>
        <td><input type="text" name="u_name" value="<?php echo $name;?>" pattern="[A-Za-z\s.,&]{0,25}" required/></td>
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
          <select name="u_state">
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
          <td><input type="text" name="u_contact" placeholder="Eg:0122345678" pattern="[0]{1}[1]{1}[0-9]{8,9}" value="<?php echo $contact;?>"required /></td>
      </tr>




      <tr align="center">
        <td align="center" colspan="1"><button><a href="cart.php" style="text-decoration:none;">Back</a></button></td>
        <td colspan="10"><input type="submit" name="orders" value="Confirm Order" /></td>

      </tr>

    </table>



</form>



<?php
  if(isset($_POST['orders'])){

    //getting the text data from the fields
    $total = 0;
    $tt=date('Y-m-d');
    $reference=(rand(1000,99999));

    $user_id = $u_id;
    $user_name = $_POST['u_name'];
    $user_email = $_POST['u_email'];
    $user_address = $_POST['u_address'];
    $user_contact = $_POST['u_contact'];

    $sel_price = "select * from cart";
    $run_price = mysqli_query($con,$sel_price);

    while ($p_price = mysqli_fetch_array($run_price)){

      $pro_id = $p_price ['product_id']; //from cart table
      $pro_qty = $p_price ['qty']; // from cart table

      //declare data from products table
      $pro_price = "select * from products where sport_id = '$pro_id'";
      $run_pro_price = mysqli_query ($con, $pro_price);

      while ($pp_price = mysqli_fetch_array($run_pro_price)){

        $sport_price = array ($pp_price ['sport_price']); //put price into $sport_price
        $single_price = $pp_price ['sport_price'];
        $sports_price = $single_price * $pro_qty;
        $values = array_sum ($sport_price);
        $total += $sports_price;
        $discount_price = $total * .10;
        $promotion_price = $total - $discount_price;





    $insert_detail = "select user_id from orders where user_id = '$user_id'";
    $run_detail = mysqli_query($con,$insert_detail);

    $delivery_details = "insert into orders (user_id,customer_name,customer_email,customer_address,customer_contact,date,order_reference,total_price) values
    ('$user_id','$user_name','$user_email','$user_address','$user_contact','$tt','$reference','$promotion_price')";
    $insert_delivery = mysqli_query($con,$delivery_details);
    if($insert_delivery){

      include ("delivery_details.php");

      }

 ?>
 <?php }}} ?>



 <?php

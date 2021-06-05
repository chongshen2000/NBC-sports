<!DOCTYPE>
<html>
<body background="images/admin.jpg">
<br><br></br>
	<table width="790" align="center" bgcolor="skyblue">

	<tr align="center">
		<td colspan=6><h2>Report on All Transaction</h2></td>

	</tr>


		<tr align="center" style="font-size:20" bgcolor="blue">
			<th>S.N</th>
			<th>Date</th>
			<th>Order ID</th>
			<th>Order reference</th>
			<th>User ID</th>
			<th>Total Price (RM)</th>
		</tr>


	<?php
	include("includes/db.php");

	$get_re = "select * from orders";

	$run_re = mysqli_query($con, $get_re);

	$i = 0;

	while($row_re = mysqli_fetch_array($run_re)){

		$date = $row_re['date'];
		$order_reference =$row_re['order_reference'];
		$order_id = $row_re['order_id'];
		$user_id = $row_re['user_id'];
		$total_price = $row_re['total_price'];

		$i++;


	?>

	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $date;?></td>
		<td><?php echo $order_id;?></td>
		<td><?php echo $order_reference;?></td>
		<td><?php echo $user_id;?></td>
		<td><?php echo $total_price;?></td>

	</tr>


	<?php } ?>

</table>

<h2 align="center">Total Transaction :
<?php
include("includes/db.php");
$sql= "select * from orders";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
echo $num;
echo "<br>";
?>
</h2>

<h2 align="center">Total Sales : RM
<?php
include("includes/db.php");
$totalsale = 0;
$sql3= "select * from orders";
while($row3 = mysqli_fetch_array($result))
{
	$total_price = $row3['total_price'];
	$totalsale += $total_price;
?>

<?php } ?>

<?php echo $totalsale;
echo "<br>";
?>
</h2>

<br/><br/>
<div align="center">
<input type="button" name ="Back" value = "BACK" onclick="window.location.href = 'yearly.php'"/> <br /><br />
<input type="button" name ="Back" value = "Main Menu" onclick="window.location.href = 'index.php?view_report'"/> <br /><br />
</div>
</div>
</body>
</html>

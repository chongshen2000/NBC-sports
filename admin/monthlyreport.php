<!DOCTYPE>
<html>
<body background="images/maxresdefault.jpg">
<h2 style="color:skyblue">Month :
<?php
$mo=$_POST['month'];
$_SESSION['mo']=$mo;
echo "".$_SESSION['mo']."";
?></h2>

<h2 style="color:skyblue">Year :
<?php
$ye=$_POST['year'];
$_SESSION['ye']=$ye;
echo "".$_SESSION['ye']."";
?></h2>


<table width="790" align="center" bgcolor="skyblue">
	<tr align="center" style="font-size:20" bgcolor="skyblue">
		<th>Date</th>
		<th>Order reference</th>
		<th>Order ID</th>
		<th>User ID</th>
		<th>Total Price (RM)</th>
	</tr>

	<?php
			include("includes/db.php");
			$sql="SELECT * FROM orders WHERE EXTRACT(MONTH FROM date)= '".$_SESSION['mo']."' AND EXTRACT(YEAR FROM date)= '".$_SESSION['ye']."'";
			$result=mysqli_query($con,$sql);
			if (mysqli_num_rows($result) > 0)
			{
				// output data of each row
				while($row3 = mysqli_fetch_assoc($result))
				{
					echo "<th>".$row3["date"]."</th>";
					echo "<th>".$row3["order_reference"]."</th>";
					echo "<th>".$row3["order_id"]."</th>";
					echo "<th>".$row3["user_id"]."</th>";
					echo "<th>".$row3["total_price"]."</th>";
					echo "<tr>".PHP_EOL;
				}
			}
			else
			{
				echo "0 results";
			}
			echo "<tr>".PHP_EOL;
	?>
</table>

<h2 align="center">Total Transaction :
<?php
include("includes/db.php");
$mo=$_POST['month'];
$_SESSION['mo']=$mo;
$sql="SELECT * FROM orders WHERE EXTRACT(MONTH FROM date)= '".$_SESSION['mo']."' AND EXTRACT(YEAR FROM date)= '".$_SESSION['ye']."'";
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
$sql="SELECT * FROM orders WHERE EXTRACT(MONTH FROM date)= '".$_SESSION['mo']."' AND EXTRACT(YEAR FROM date)= '".$_SESSION['ye']."'";
$result=mysqli_query($con,$sql);
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


<br>
	<div align="center">
	<input type="button" name ="Back" value = "BACK" onclick="window.location.href = 'monthly.php'"/> <br /><br />
	<input type="button" name ="Back" value = "Main Menu" onclick="window.location.href = 'index.php?view_report'"/> <br /><br />
	</div>
	</div>

</div>
</table>
</body>
</html>

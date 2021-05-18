<!DOCTYPE>
<html>
<body background="images/background.jpg">
<br><br>

	<div align="center">
		<tr>
		<h1 style="color:#ff33ff">Monthly Report</h1>
		<br/>
			<form method="POST" action="monthlyreport.php">

			<?php
			include ("includes/db.php");
			$query="SELECT MONTH (orders.date) AS month FROM orders GROUP BY month";
			$result = mysqli_query($con,$query);

			echo "Select Month :";
			echo "<select name=\"month\">";


			while ($row=mysqli_fetch_array($result))
			{
				echo "<option value='".$row['month']."'>".$row['month']."</option>";
}
			echo "</select>";
			echo "<br><br>";

			$query1 = "SELECT YEAR (orders.date) AS year FROM orders GROUP BY year";
			$result1 = mysqli_query($con,$query1) or die ("cant");
			echo "Select Year : ";
			echo "<select name=\"year\">";

			while ($row=mysqli_fetch_array($result1))
			{
					echo "<option value= '".$row['year']."' > ".$row['year']." </option>";
			}

			echo "</select>";
			echo "<br><br>";
			?>

			<p><input type="submit" value="Search This Month" name="search"/></p>
			</form>
			<br />

			<input type="button" name="Back" value="BACK" onclick="window.location.href = 'index.php?view_report'"/> <br /><br />

	</tr>
</div>
</body>
</html>

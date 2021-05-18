<!DOCTYPE>
<html>
<body background="images/background.jpg">
<br><br>

	<div align="center">
		<tr>
		<h1 style="color:#ff33ff">Yearly Report</h1>
		<br/>
			<form method="POST"action="yearlyreport.php">

			<?php
			include("includes/db.php");
			$query = "SELECT YEAR (orders.date) AS year FROM orders GROUP BY year";
			$result = mysqli_query($con,$query) or die ("cant");
			echo "Select Year : ";
			echo "<select name=\"year\">";
			 while($row=mysqli_fetch_array($result))
			 {
				  echo "<option value= '".$row['year']."' > ".$row['year']." </option>";
			 }
			 echo "</select>";
			 echo "<br><br>";

			?>
			<p><input type="submit" value="Search This Year" name="search"/></p>
			</form>
			<br />

			<input type="button" name ="Back" value = "BACK" onclick="window.location.href = 'index.php?view_report'"/> <br /><br />


	</div>
</tr>
</div>
</body>

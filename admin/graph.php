<!DOCTYPE html>
<?php
session_start();
include("includes/db.php");
$query = "SELECT pro_title, sum(quantity) AS qtyy from ordersdetail where status='done' group by pro_id order by qtyy desc LIMIT 9 ";
$result = mysqli_query($con, $query);
$query1 = "SELECT pro_title, sum(quantity) AS qty from ordersdetail where status='done' group by pro_id order by qty desc LIMIT 9 ";
$result1 = mysqli_query($con, $query1);


?>

<html>

<body background="images/admin.jpg">
</body>
<br></br>
<table width="790" align="center" bgcolor=skyblue>

  <tr align="center">
    <td colspan=4>
      <h2>Top 9 Best Seller</h2>
    </td>

  </tr>

  <tr align="center" bgcolor="blue">

    <th>NO</th>
    <th>sport ID</th>
    <th>sport Name</th>
    <th>Quantity</th>


  </tr>

  <?php
  include("includes/db.php");

  $get_re = "select *, sum(quantity) AS qtyy from ordersdetail where status='completeds' group by pro_id order by qtyy desc LIMIT 9 ";
  $run_re = mysqli_query($con, $get_re);
  $i = 0;

  while ($row_re = mysqli_fetch_array($run_re)) {

    $pro_id = $row_re['pro_id'];
    $qty = $row_re['qtyy'];
    $pro_titles = $row_re['pro_title'];
    $i++;

  ?>

    <tr align="center">
      <td><?php echo $i; ?></td>
      <td><?php echo $pro_id; ?></td>
      <td><?php echo $pro_titles; ?></td>
      <td><?php echo $qty; ?></td>
    </tr>

  <?php } ?>

</table>

<h3 align="center">*Quantity will be counted when the order's status = done!</h3>

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load the Visualization API and the corechart package.
  google.charts.load('current', {
    'packages': ['corechart']
  });

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create the data table.
    var data = new google.visualization.arrayToDataTable([
      ['pro_title', 'qtyy'],
      <?php
      while ($row = mysqli_fetch_array($result)) {
        echo "['" . $row["pro_title"] . "'," . $row["qtyy"] . "],";
      }
      ?>

    ]);

    // Set chart options
    var options = {
      'title': 'Top 9 Best Seller',
      'width': 700,
      'height': 500,
      is3D: true
    };



    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawVisualization);


  function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
      ['pro_title', 'qty'],
      <?php
      while ($row = mysqli_fetch_array($result1)) {
        echo "['" . $row["pro_title"] . "'," . $row["qty"] . "],";
      }
      ?>

    ]);

    var options = {
      title: 'Top 9 Best Seller',
      vAxis: {
        title: 'Number of sale'
      },
      hAxis: {
        title: 'sport name'
      },
      seriesType: 'bars',
      series: {
        9: {
          type: 'line'
        }
      }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart1_div'));
    chart.draw(data, options);
  }
</script>
</head>


<table align="center" bgcolor=blue height="300px" width="800px">
  <!--Div that will hold the bar chart-->
  <tr>
    <td id="chart1_div"></td>
  </tr>
</table>

<br></br>


<table align="center" bgcolor=blue>
  <!--Div that will hold the pie chart-->
  <tr>
    <td id="chart_div"></td>
  </tr>

</table>


<input type="button" name="Back" value="BACK" onclick="window.location.href = 'index.php?view_report'" /> <br /><br />


</html>

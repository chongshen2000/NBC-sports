<?php
session_start();

session_destroy();
$con =mysqli_connect("localhost","root","","NBC sports");
global $con;
$delete_cart ="delete from cart";
$run_delete = mysqli_query($con,$delete_cart);

echo "<script>window.open('index.php','_self')</script>";


?>

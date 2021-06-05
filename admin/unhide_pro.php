<?php
include("includes/db.php");
if (isset($_GET['unhide_pro'])) {
    $id = $_GET['unhide_pro'];
    $query = "SELECT * FROM products where sport_id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $name = $row['sport_name'];
} else {
    echo "<script>window.open('index.php?view_products','_self')</script>";
}

if (isset($_POST['yes'])) {

    $query = "UPDATE products SET isHidden = 0 WHERE sport_id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('The product " . $name . " has been shown to menu!')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
if (isset($_POST['no'])) {
    echo "<script>window.open('index.php?view_products','_self')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <form method="post">
        <table width="790" align="center" bgcolor="skyblue">

            <tr align="center">
                <td colspan="10">
                    <h2><b>Un-hide <?php echo $name ?> ?</b></h2>
                </td>
            </tr>

            <tr align="center">
                <td colspan="10">
                    <h2><b>Are you sure? </b></h2>
                </td>
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
    <br>
    <td><button><a href="index.php?view_products" style="text-decoration:none;">Back</a></button></td>
    <br><br><br><br></br>



</body>

</html>
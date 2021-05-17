<?php

$con =mysqli_connect("localhost","root","","NBC sports");

if(mysqli_connect_errno())
{
	echo "The Connection was not established". mysqli_connect_error();
}


//creating the shopping cart
function cart(){
		if(isset($_GET['add_cart'])){
		global $con;
		$pro_id = $_GET['add_cart'];
		$check_pro = "select * from cart where product_id='$pro_id'";
		$run_check = mysqli_query ($con,$check_pro);
		
			$insert_pro = "insert into cart(product_id,qty) values('$pro_id',1)";
			$run_pro = mysqli_query($con,$insert_pro);
			echo "<script>window.open('index.php','_self')</script>";
		$pro_qty++;
	}
}

//getting total added items
function total_items(){

	if(isset($_GET['add_cart'])){

		global $con;

		$get_items = "select * from cart";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
	}
		else{
			global $con;

			$get_items = "select * from cart ";
			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);
		}

	echo $count_items;
	}

//getting total price of itmes in cart
function total_price(){

	$total = 0;
	global $con;

	$sel_price = "select * from cart ";
	$run_price = mysqli_query($con,$sel_price);

	while ($p_price = mysqli_fetch_array($run_price)){

		$pro_id = $p_price ['product_id']; //from cart table
	  $pro_qty = $p_price ['qty']; // from cart table

		$pro_price = "select * from products where food_id = '$pro_id'";
		$run_pro_price = mysqli_query ($con, $pro_price);

		while ($pp_price = mysqli_fetch_array($run_pro_price)){

			$food_price = array ($pp_price ['food_price']);
			$single_price = $pp_price ['food_price'];
			$foods_price = $single_price * $pro_qty;
			$values = array_sum($food_price);
			  $total += $foods_price;
		}
	}
	echo "RM" . $total  ;
}

//getting the categories

function getCat(){

	global $con;

	$get_cat="select * from category";

	$run_cat = mysqli_query ($con, $get_cat);

	while ($row_cat=mysqli_fetch_array($run_cat)){

		$cat_id = $row_cat {'cat_id'};
		$cat_title = $row_cat{'cat_title'};

	echo"<li><a href = 'index.php?cat=$cat_title'>$cat_title</a></li>";

	}

}

//display product in main pages
function getPro(){

	if(!isset($_GET['cat'])){

	global $con;
 // display 6 products randomly
	$get_pro = "select * from products order by RAND() LIMIT 0,6";
	$run_pro = mysqli_query ($con, $get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){

			 $pro_id = $row_pro ['food_id'];
			 $pro_title = $row_pro ['food_name'];
			 $pro_image = $row_pro ['food_image'];
			 $pro_price = $row_pro ['food_price'];
			 $pro_cat = $row_pro ['food_category'];

			 echo "
 	      <div id= 'single_product'>
 	        <img src='admin/product_images/$pro_image'width='150'height='180' />
 	         <a href='details.php?pro_id=$pro_id'> <p>$pro_title</p></a>
 	        <p><b> RM $pro_price </b></p>
 	        <a href='index.php?add_cart=$pro_id'><button style ='float:right;' > Add to Cart</button></a>
 	      </div>";

	}
}
}

//display products by category
function getCatPro(){

	if(isset($_GET['cat'])){
		$cat_title=$_GET['cat'];
	global $con;

	$get_cat_pro = "select * from products where food_category='$cat_title'";
	$run_cat_pro = mysqli_query ($con, $get_cat_pro);
	$count_cats = mysqli_num_rows($run_cat_pro);

	if($count_cats==0){
		echo "<h2 style='padding:20px;'>There is no product in this category</h2>";
		exit();
	}

	while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
 //use msql name
		$pro_id = $row_cat_pro ['food_id'];
		$pro_title = $row_cat_pro ['food_name'];
		$pro_image =$row_cat_pro ['food_image'];
		$pro_price =$row_cat_pro ['food_price'];
		$pro_cat = $row_cat_pro ['food_category'];

		echo "
		<div id= 'single_product'>
			<img src='admin/product_images/$pro_image'width='150'height='180' />
			 <a href='details.php?pro_id=$pro_id'> <p>$pro_title</p></a>
			<p><b> RM $pro_price </b></p>
			<a href='index.php?add_cart=$pro_id'><button style ='float:right;' > Add to Cart</button></a>
		</div>";
	}

}
}


//display 9 best-seller food
function getBest(){
  if(!isset($_GET['cat'])){
  global $con;
  $i=0;
  $get_best = "select pro_id, sum(quantity) AS qtyy from ordersdetail group by pro_id order by qtyy desc LIMIT 9";
  $run_pro = mysqli_query ($con, $get_best);

  while($row_pro=mysqli_fetch_array($run_pro)){
    $pro_id = $row_pro['pro_id'];

    $sel_f= "select * from products where food_id = '$pro_id'";
    $run_f = mysqli_query($con, $sel_f);
    while ($row_r=mysqli_fetch_array($run_f)){

      $food_title = $row_r['food_name'];
      $pro_image = $row_r['food_image'];
      $pro_price = $row_r ['food_price'];
      $pro_cat = $row_r ['food_category'];
      $i++;

      echo "
       <div id= 'single_product'>
       <p>$i </p>
         <img src='admin/product_images/$pro_image'width='150'height='180' />
         <a href='details.php?pro_id=$pro_id' > <p>$food_title</p></a>
         <p><b> RM $pro_price </b></p>
         <a href='index.php?add_cart=$pro_id'><button style ='float:right;' > Add to Cart</button></a>
       </div>

     ";
 }
}
}
}

?>

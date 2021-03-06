<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "php/config.php";

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
            
			echo "
					
				<li type='button' cid='$cid'>
								
					<a href='store.php?cid=".$cid."'>
						<span  ></span>
						$cat_name
						<small class='qty'></small>
					</a>
				</li>
				
			";
            
		}
	}
}


if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Brand</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "
				<div type='button' class='btn navbar-btn selectBrand' bid='$bid'>
					
					<a href='#'>
						<span ></span>
						$brand_name
						<small >($count)</small>
					</a>
				</div>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1; $i<=$pageno; $i++){
		if($i == 1){
			echo'
				<li class="pageitem active" id="'.$i.'"><a href="JavaScript:Void(0);" data-id="'.$i.' class="page-link">'.$i.'</a></li>
			';
		}else{
			echo '
				<li class="pageitem" id="'.$i.'"><a href="JavaScript:Void(0);" data-id="'.$i.' class="page-link">'.$i.'</a></li>
			';
		}
	}
}

if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            
            $cat_name = $row["cat_title"];
			echo "
                        
				<div class='col-md-4 col-xs-6' >
						<a href='product.php?p=$pro_id'><div class='product'>
							<div class='product-img'>
								<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
								<div class='product-label'>
									<span class='sale'>-30%</span>
									<span class='new'>NEW</span>
								</div>
							</div></a>
							<div class='product-body'>
								<p class='product-category'>$cat_name</p>
								<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
								<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
								<div class='product-rating'>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
								</div>
								<div class='product-btns'>
									<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
									<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
									<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
								</div>
							</div>
							<div class='add-to-cart'>
								<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
							</div>
						</div>
					</div>
                        
			";
		}
	}
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
		
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products,categories WHERE product_brand = '$id' AND product_cat=cat_id";
	}else {
		
		$keyword = $_POST["keyword"];
		header('Location:store.php');
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
		
	}

	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$cat_name = $row["cat_title"];
			echo "
						
				<div class='col-md-4 col-xs-6'>
					<a href='product.php?p=$pro_id'><div class='product'>
						<div class='product-img'>
							<img  src='product_images/$pro_image'  style='max-height: 170px;' alt=''>
							<div class='product-label'>
								<span class='sale'>-30%</span>
								<span class='new'>NEW</span>
							</div>
						</div></a>
						<div class='product-body'>
							<p class='product-category'>$cat_name</p>
							<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
							<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
							<div class='product-rating'>
								<i class='fa fa-star'></i>
								<i class='fa fa-star'></i>
								<i class='fa fa-star'></i>
								<i class='fa fa-star'></i>
								<i class='fa fa-star'></i>
							</div>
							<div class='product-btns'>
								<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
								<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
								<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
							</div>
						</div>
						<div class='add-to-cart'>
							<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
						</div>
					</div>
				</div>
			";
		}
	}
	
if(isset($_POST['category_selected'])){
	$id = $_POST['cat_id'];
	$sql = "SELECT * FROM products, categories WHERE product_cat = '$id' AND product_cat=cat_id";
	$run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) <= 0){
		echo '<p class="text-center mt-3">No products found with this category</p>
			<p class="text-center mb-5 mt-2">Loading other products</p>
		';
	}else{
		while($row=mysqli_fetch_array($run_query)){
			$pro_id = $row['product_id'];
			$pro_cat = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$cat_name = $row["cat_title"];
			
			echo '
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-product">
						<div class="product-image">
							<img style="width 100%; height: 40vh; object-fit: contain" src="product_images/'.$pro_image.'" alt="#">
							<div class="button">
								<button pid='.$pro_id.' id="product" class="btn add-to-cart-btn"><i class="lni lni-cart"></i> Add to Cart</button>
							</div>
						</div>
						<div class="product-info">
							<span class="category">'.$cat_name.'</span>
							<h4 class="title">
								<a href="product-details.php?p='.$pro_id.'">'.$pro_title.'</a>
							</h4>
								<ul class="review">
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star"></i></li>
								<li><span>4.0 Review(s)</span></li>
							</ul>
							<div class="price">
								<span>GHS. '.$pro_price.'.00</span>
							</div>
						</div>
					</div>
				</div>
			';
		}
	}
}

//Get all Products
if(isset($_POST['all_products'])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		$pro_id = $row['product_id'];
		$pro_cat = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		$cat_name = $row["cat_title"];
		
		echo '
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-product">
					<div class="product-image">
						<img style="width 100%; height: 40vh; object-fit: contain" src="product_images/'.$pro_image.'" alt="#">
						<div class="button">
							<button pid='.$pro_id.' id="product" class="btn add-to-cart-btn"><i class="lni lni-cart"></i> Add to Cart</button>
						</div>
					</div>
					<div class="product-info">
						<span class="category">'.$cat_name.'</span>
						<h4 class="title">
							<a href="product-details.php?p='.$pro_id.'">'.$pro_title.'</a>
						</h4>
							<ul class="review">
							<li><i class="lni lni-star-filled"></i></li>
							<li><i class="lni lni-star-filled"></i></li>
							<li><i class="lni lni-star-filled"></i></li>
							<li><i class="lni lni-star-filled"></i></li>
							<li><i class="lni lni-star"></i></li>
							<li><span>4.0 Review(s)</span></li>
						</ul>
						<div class="price">
							<span>GHS. '.$pro_price.'.00</span>
						</div>
					</div>
				</div>
			</div>
        ';
	}
}

//Add Product to Cart from Product Details page
if(isset($_POST['addToCartFromDetails'])){

	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$product_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		if(mysqli_num_rows($run_query) > 0){
			$update_ = "UPDATE cart SET qty = '$quantity' WHERE p_id = '$product_id' AND user_id = '$user_id' ";
			$update_qry = mysqli_query($con, $update_);
			if($update_qry){
				echo 'done';
			}
			exit();
		}
		$sql = "INSERT INTO `cart`
		(`p_id`, `ip_add`, `user_id`, `qty`) 
		VALUES ('$product_id','$ip_add','$user_id','1')";
		if(mysqli_query($con,$sql)){
			echo "
				done
			";
		}

	}else{
		$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$product_id' AND user_id = -1";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			$update_ = "UPDATE cart SET qty = '$quantity' WHERE p_id = '$product_id' AND ip_add = '$ip_add' ";
			$update_qry = mysqli_query($con, $update_);
			if($update_qry){
				echo 'done';
			}
			exit();
		}
		$sql = "INSERT INTO `cart`
		(`p_id`, `ip_add`, `user_id`, `qty`) 
		VALUES ('$product_id','$ip_add','-1','$quantity')";
		if (mysqli_query($con,$sql)) {
			echo "
				done
			";
			exit();
		}
		
	}
}

//Add Product to Cart
if(isset($_POST["addToCart"])){
	

	$p_id = $_POST["proId"];
	

	if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		if(mysqli_num_rows($run_query) > 0){
			echo "exist";
			exit();
		}
		$sql = "INSERT INTO `cart`
		(`p_id`, `ip_add`, `user_id`, `qty`) 
		VALUES ('$p_id','$ip_add','$user_id','1')";
		if(mysqli_query($con,$sql)){
			echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Added..!</b>
				</div>
			";
		}
	}else{
		$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			echo "exist";
			exit();
		}
		$sql = "INSERT INTO `cart`
		(`p_id`, `ip_add`, `user_id`, `qty`) 
		VALUES ('$p_id','$ip_add','-1','1')";
		if (mysqli_query($con,$sql)) {
			echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Your product is Added Successfully..!</b>
				</div>
			";
			exit();
		}
		
	}
	
	
	
	
}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image, a.size, a.color, b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image, a.size, a.color, b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$product_price = $qty*$product_price;
				$total_price=$total_price+$product_price;

				echo '
					<li class="product-widget">
						<a remove_id="'.$product_id.'" class="remove-from-c remove" href="javascript:void(0)"><i class="lni lni-close"> </i></a>
						<div class="product-img cart-img-head">
							<a class="cart-img" href="product-details.html">
							<img class="cart-img" src="product_images/'.$product_image.'" alt=""></a>
						</div>
						<div class="product-body content">
							<h4 class="product-name"><a href="#">'.$product_title.'</a></h4>
							<p class="product-price"><span style="display:none" class="qty">'.$n.'</span> <span class="amount"> GHS. '.$product_price.' </span></p>
						</div>
						
					</li>
				';
				
			}
			echo '
				<div class="cart-summary">
					<small class="qty">'.$n.' Item(s) selected</small>
					<h5>GHS. '.number_format($total_price).'</h5>
				</div>
			'
            ?>
				
				
			<?php
			
			exit();
		}else{
			echo " <p class='text-center'> Your Cart is empty</p>";
		}
	}
	
    
    
    if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo '
				<form method="post" action="check_logged_in.php">
					<div class="cart-list-title" id="cart">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<p>Product Details</p>
							</div>
							<div class="col-lg-2 col-md-2 col-12">
								<p>Quantity</p>
							</div>
							<div class="col-lg-2 col-md-2 col-12">
								<p>Unit Price</p>
							</div>
							<div class="col-lg-2 col-md-2 col-12">
								<p>Subtotal (GHS.)</p>
							</div>
						</div>
					</div>
            ';
				
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$color = $row["color"];
				$size = $row["size"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];

				echo 
					'
					<div class="cart-single-list">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<a href="product-details.php?p='.$product_id.'"><img class="img-fluid" style="width: 100px; height: 100px; object-fit: contain; " src="product_images/'.$product_image.'" alt="#"></a>
								<h5 class="product-name mt-3"><a href="product-details.php?p='.$product_id.'">
									'.$product_title.'</a></h5>
								<p class="product-des mt-3">
									<span><em">Color:</em> '.$color.'</span>
									<span><em">Size:</em> '.$size.'</span>
								</p>
							</div>

							<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
				            <input type="hidden" name="" value="'.$cart_item_id.'"/>

							<div class="col-lg-2 col-md-2 col-12 mt-1">
								<div class="count-input">
									<input title="quantity" class="form-control p-2 qty" type="text" value="'.$qty.'" >
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-12 mt-1">
								<input title="Unit Price" class="form-control p-2 price" style="background: #d3d3d3; color: black; font-weight: medium" type="text" value="'.$product_price.'" readonly="readonly" >
							</div>
							<div class="col-lg-2 col-md-2 col-12 mt-1">
								<input title="Total Price" type="text" class="form-control p-2 total" style="background: #d3d3d3; color: black; font-weight: medium" value="'.$product_price.'" readonly="readonly">
							</div>
							<div class="col-lg-3 col-md-3 col-12">
								<a href="javascript:void(0)" style="width: 70px; height: 35px; border-radius: 2%; font-size: 12px; align-text: center; display: none " class="remove-item update" update_id="'.$product_id.'"> Update <i class="lni lni-refresh"></i></a>
								<a remove_id="'.$product_id.'" style="width: 70px; height: 35px; border-radius: 2%; font-size: 12px; align-text: center"  class="remove-item remove" href="javascript:void(0)">Remove<i class="lni "> </i></a>
							</div>
						</div>
					</div>
				
				';
			}
			
			echo '
					<div class="row">
						<div class="col-12">
							<div class="total-amount">
								<div class="row">
									<div class="col-lg-8 col-md-6 col-12">
										
									</div>
									<div class="col-lg-4 col-md-6 col-12">
										<div class="right">
											<ul>
												<li>Cart Subtotal<span style="font-weight:bold" class="net_total"> </span></li>
												<li>Shipping<span>Free</span></li>
												<li>Coupon<span>00</span></li>
												<li class="last" style="font-weight: bold; color:#e63946; font-size: 16px; ">TOTAL<span class="net_total"></span></li>
											</ul>
											<div class="button" id="checkout-and-shop-buttons">
												<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
												<input class="btn ready-to-checkout" type="submit" id="submit" name="login_user_with_product" value="Ready to Checkout"> 
												<a href="store.php" class="btn btn-alt">Continue shopping</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
							
			';
		}else{
			echo '
				<div class="div container">
					<div class="row">
						<div class="col-12">
							<h4 class="text-center mt-3">Your Cart is empty</h4>
							<p style="color: #e63946;" class="text-center"><a style="color: #e63946; font-size: 16px" href="store.php" class="text-center mt-2"> Visit store To add items to cart </a></p>
						</div>
					</div>
				</div>
			';
		}
	}
	
	
}

//Remove Item From cart in Checkout page
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	mysqli_query($con,$sql);

	//update cart badge
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}

//Remove Item From cart dropdown
if (isset($_POST["removeItemFromC"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	mysqli_query($con,$sql);

	//update cart badge
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}


?>







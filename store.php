<?php include_once 'include/head.php' ?>
<body>

<?php include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>

<div class="breadcrumbs">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="breadcrumbs-content">
				<h1 class="page-title">Store</h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<ul class="breadcrumb-nav">
					<li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
					<li><a href="javascript:void(0)">Shop</a></li>
					<li>Store</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<section class="product-grids section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12">
				<div class="product-sidebar">
					<div class="single-widget search">
						<h3>Search Product</h3>
						<form action="#">
							<input type="text" placeholder="Search Here...">
							<button type="submit"><i class="lni lni-search-alt"></i></button>
						</form>
					</div>
					<div class="single-widget">
						<h3>All Categories</h3>
						<nav>
							<ul class="list" class="nav nav-tabs" id="nav-tab" role="tablist">
						
								<?php
									include_once "php/config.php";
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
													
												<li type='button'>
																
													<a cid='$cid' href='javascript:void()' class='category-selected'>
														<span  ></span>
														$cat_name
														<small class='qty'>($count)</small>
													</a>
												</li>
												
											";
										}
									}
								?>
							</ul>
						</nav>
					</div>
					<div class="single-widget range">
						<h3>Price Range</h3>
						<input type="range" class="form-range" name="range" step="1" min="100" max="10000" value="10" onchange="rangePrimary.value=value">
						<div class="range-inner">
							<label>₵ </label>
							<input type="text" id="rangePrimary" placeholder="100" />
						</div>
					</div>
					<div class="single-widget condition">
						<h3>Filter by Price</h3>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
							<label class="form-check-label" for="flexCheckDefault1">
							GHS. 50 - GHS. 100
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
							<label class="form-check-label" for="flexCheckDefault2">
							GHS. 100 - GHS. 500 
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
							<label class="form-check-label" for="flexCheckDefault3">
							GHS. 500 - GHS. 1,000
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
							<label class="form-check-label" for="flexCheckDefault4">
							GHS. 1,000 - GHS. 5,000
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-12">
				<div class="product-grids-head">
					<div class="product-grid-topbar">
						<div class="row align-items-center">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="product-sorting">
									<label for="sorting">Sort by:</label>
									<select class="form-control" id="sorting">
										<option>Popularity</option>
										<option>Low - High Price</option>
										<option>High - Low Price</option>
										<option>Average Rating</option>
										<option>A - Z Order</option>
										<option>Z - A Order</option>
									</select>
									<h3 class="total-show-product">Showing: <span>1 - 15 items</span></h3>
								</div>
							</div>
							<div class="col-lg-5 col-md-4 col-12">
								<nav>
									<div class="single-widget search">
										<form action="#">
											<input class="form-control" type="text" placeholder="Search Here...">
											<button style="display: none;" type="submit"><i class="lni lni-search-alt"></i></button>
										</form>
									</div>
								</nav>
							</div>
						</div>
					</div>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
							<div class="row" id="category_items">
								<?php
									include_once "php/config.php";
									$sql = "SELECT * FROM products limit 15";
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
								?>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="pagination left">
										<ul class="pagination-list">
											<li class="active"><a href="javascript:void(0)">1</a></li>
											<li><a href="javascript:void(0)">2</a></li>
											<li><a href="javascript:void(0)">3</a></li>
											<li><a href="javascript:void(0)">4</a></li>
											<li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once "include/footer.php" ?>

<?php include_once "include/script.php" ?>
<script src="actions.js"></script>
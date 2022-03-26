<?php include_once 'include/head.php' ?>
<body>

<?php include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>

<div class="breadcrumbs">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="breadcrumbs-content">
				<h1 class="page-title">Shop Grid</h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<ul class="breadcrumb-nav">
					<li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
					<li><a href="javascript:void(0)">Shop</a></li>
					<li>Shop Grid</li>
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
						<ul class="list">
							<li>
								<a href="product-grids.php">Men Shoes</a><span>(1138)</span>
							</li>
							<li>
								<a href="product-grids.php">Men Slippers</a><span>(2356)</span>
							</li>
							<li>
								<a href="product-grids.php">Sneakers</a><span>(420)</span>
							</li>
							<li>
								<a href="product-grids.php">Women Shoes</a><span>(874)</span>
							</li>
							<li>
								<a href="product-grids.php">Women Bags</a><span>(1239)</span>
							</li>
							<li>
								<a href="product-grids.php">Men Wear (clothes)</a><span>(340)</span>
							</li>
							<li>
								<a href="product-grids.php">Women Wear (clothes)</a><span>(512)</span>
							</li>
						</ul>
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
					<div class="single-widget condition">
						<h3>Filter by Brand</h3>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
							<label class="form-check-label" for="flexCheckDefault11">
							Men Shoes (254)
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
							<label class="form-check-label" for="flexCheckDefault22">
							Men Slippers (39)
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault33">
							<label class="form-check-label" for="flexCheckDefault33">
							Sneakers (128)
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault44">
							<label class="form-check-label" for="flexCheckDefault44">
							Women Shoes (310)
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault55">
							<label class="form-check-label" for="flexCheckDefault55">
							Women Bags (42)
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault66">
							<label class="form-check-label" for="flexCheckDefault66">
							Men Wear (217)
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault77">
							<label class="form-check-label" for="flexCheckDefault77">
							Women Wear (310)
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
									<div class="nav nav-tabs" id="nav-tab" role="tablist">
										<button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
										<button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
									</div>
								</nav>
							</div>
						</div>
					</div>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p1.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Women Bags</span>
											<h4 class="title">
												<a href="product-details.php">Designer Bag and Shoe</a>
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
												<span>GHS. 299.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
										<img src="images/products/p3.jpeg" alt="#">	
											<span class="sale-tag">-25%</span>
											<div class="button">
											<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
 								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p2.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Women Bags</span>
											<h4 class="title">
												<a href="product-details.php">Designer Bag and Shoe</a>
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
												<span>GHS. 299.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p4.jpeg" alt="#">
											<span class="new-tag">New</span>
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p5.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p6.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p7.jpeg" alt="#">
											<span class="sale-tag">-50%</span>
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p8.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p9.jpeg" alt="#">
											<span class="sale-tag">-25%</span>
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p10.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p11.jpeg" alt="#">
											<span class="sale-tag">-25%</span>
											<div class="button">
											<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Designer Shoe</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
 								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p12.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Slippers</span>
											<h4 class="title">
												<a href="product-details.php">Quality Men Slippers</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 75.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p13.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Shoes</span>
											<h4 class="title">
												<a href="product-details.php">Quality Men Shoes</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 175.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p14.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Sneakers</span>
											<h4 class="title">
												<a href="product-details.php">Designer Men Sneakers</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 275.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-image">
											<img src="images/products/p15.jpeg" alt="#">
											<div class="button">
												<a href="cart.php" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
											</div>
										</div>
										<div class="product-info">
											<span class="category">Men Slippers</span>
											<h4 class="title">
												<a href="product-details.php">Quality Men Slippers</a>
											</h4>
											<ul class="review">
											<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><i class="lni lni-star-filled"></i></li>
												<li><span>5.0 Review(s)</span></li>
											</ul>
											<div class="price">
												<span> GHS. 75.00</span>
												<span class="discount-price">GHS. 300.00</span>
											</div>
										</div>
									</div>
								</div>
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
						<div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-12">
									<div class="single-product">
										<div class="row align-items-center">
											<div class="col-lg-4 col-md-4 col-12">
												<div class="product-image">
													<img src="images/products/p1.jpeg" alt="#">
													<div class="button">
														<a href="product-details.php" class="btn"><i class="lni lni-cart"></i> Add to
														Cart</a>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-12">
												<div class="product-info">
													<span class="category">Bags</span>
													<h4 class="title">
													<a href="product-details.php">Women Bag and Shoe</a>
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
														<span>GHS. 399.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="single-product">
										<div class="row align-items-center">
											<div class="col-lg-4 col-md-4 col-12">
												<div class="product-image">
													<img src="images/products/p3.jpeg" alt="#">
													<span class="sale-tag">-25%</span>
													<div class="button">
														<a href="product-details.php" class="btn"><i class="lni lni-cart"></i> Add to
														Cart</a>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-12">
												<div class="product-info">
													<span class="category">Men Shoe</span>
													<h4 class="title">
														<a href="product-details.php">Designer Men Shoe</a>
													</h4>
													<ul class="review">
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><span>5.0 Review(s)</span></li>
													</ul>
													<div class="price">
														<span>GHS. 275.00</span>
														<span class="discount-price">GHS. 300.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="single-product">
										<div class="row align-items-center">
											<div class="col-lg-4 col-md-4 col-12">
												<div class="product-image">
													<img src="images/products/p2.jpeg" alt="#">
													<div class="button">
														<a href="product-details.php" class="btn"><i class="lni lni-cart"></i> Add to
														Cart</a>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-12">
												<div class="product-info">
													<span class="category">Women Bag</span>
													<h4 class="title">
														<a href="product-details.php">Women Bag and Shoe</a>
													</h4>
													<ul class="review">
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><span>5.0 Review(s)</span></li>
													</ul>
													<div class="price">
														<span>GHS. 399.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="single-product">
										<div class="row align-items-center">
											<div class="col-lg-4 col-md-4 col-12">
												<div class="product-image">
													<img src="images/products/p4.jpeg" alt="#">
													<span class="new-tag">New</span>
													<div class="button">
														<a href="product-details.php" class="btn"><i class="lni lni-cart"></i> Add to
														Cart</a>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-12">
												<div class="product-info">
													<span class="category">Men Shoe</span>
													<h4 class="title">
														<a href="product-details.php">Quality Designer Men Shoe</a>
													</h4>
													<ul class="review">
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><i class="lni lni-star-filled"></i></li>
														<li><span>5.0 Review(s)</span></li>
													</ul>
													<div class="price">
														<span>GHS. 400.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="single-product">
										<div class="row align-items-center">
											<div class="col-lg-4 col-md-4 col-12">
												<div class="product-image">
													<img src="images/products/p30.jpeg" alt="#">
													<span class="sale-tag">-50%</span>
													<div class="button">
														<a href="product-details.php" class="btn"><i class="lni lni-cart"></i> Add to
														Cart</a>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-12">
												<div class="product-info">
													<span class="category">Men</span>
													<h4 class="title">
													<a href="product-details.php">Quality leather Men Shoe</a>
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
														<span>GHS. 500.00</span>
														<span class="discount-price">GHS. 700.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="pagination left">
										<ul class="pagination-list">
											<li><a href="javascript:void(0)">1</a></li>
											<li class="active"><a href="javascript:void(0)">2</a></li>
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
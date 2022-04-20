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
					<div class="single-widget">
						<h3>All Categories</h3>
						<nav>
							<ul class="list" class="nav nav-tabs" id="nav-tab" role="tablist">
								<li type='button'>
									<a  href='javascript:void()' class='all-products'>
										<span> </span>
											All Products
										<small class='qty'> </small>
									</a>
								</li>
						
								<?php
									include_once "php/config.php";
									$category_query = "SELECT * FROM categories";
		
									$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
									if(mysqli_num_rows($run_query) > 0){
										$i=1;
										while($row = mysqli_fetch_array($run_query)){
											
											$cid = $row["cat_id"];
											$cat_name = $row["cat_title"];
											$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
											$query = mysqli_query($con, $sql);
											$row = mysqli_fetch_array($query);
											$count = $row["count_items"];
											$i++;
											
											echo "
													
												<li type='button'>
													<a cid='$cid' href='javascript:void()' class='category-selected'>
														<span> </span>
														$cat_name
														<small class='qty'></small>
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
											<input id="search-product" class="form-control" type="text" placeholder="Search Here...">
											<button style="display: none;" type="submit"><i class="lni lni-search-alt"></i></button>
										</form>
									</div>
								</nav>
							</div>
						</div>
					</div>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
							<div class="row store-products" id="category_items">
								
							</div>
							<p class="text-center mt-3" id="fetch_products_message"></p>
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

<script>
	//Auto Load Data From Database
	var limit = 9;
	var start = 0;
	var action = 'inactive';
	
	function load_all_products(limit, start){
		$.ajax({
			url: 'php/fetch_all_products.php',
			method: 'POST',
			data: {limit:limit, start: start},
			cache: false,

			success: function(data){
				$(".store-products").append(data);
				if(data == ''){
					$('#fetch_products_message').html('No available Products');
					action = 'active'
				}else{
					$('#fetch_products_message').html('Please wait...');
					action = 'inactive'
				}
			}
		})
	}

	if(action == 'inactive'){
		load_all_products(limit, start);
	}
	$(window).scroll(function(){
		if($(window).scrollTop()+$(window).height() > $('.store-products').height() && action == 'inactive'){
			action = 'active';
			start = start + limit;
			setTimeout(function(){
				load_all_products(limit, start);
			}, 1000)
		}
	})


	//Search Product 1
	const searchBar = document.querySelector('#search-product')
	searchedProduct = document.querySelector('.store-products');
	searchBar.onkeyup = () => {
		let searchTerm = searchBar.value;
        let xhr = new XMLHttpRequest();
		xhr.open("POST", "php/search-store.php", true);
		xhr.onload = () => {
			if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					let data = xhr.response;
					searchedProduct.innerHTML = data;
				}
			}
		}
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send("searchTerm=" + searchTerm);
	}

	//Fetch all products
	$("body").delegate(".all-products", "click", function(event) {
        $("#category_items").html("<p class='text-center'>Loading...</p>");
        event.preventDefault();

        $.ajax({
            url: "action.php",
            method: "POST",
            data: { all_products: 1 },
            success: function(data) {
                $("#category_items").html(data);
                $(this).css({ 'font-size': '18px', 'color': 'red' });
                if (data == '') {
                    $("#category_items").html('No products found with this');
                }
            }

        })
    })

	//Get Selected category
	$("body").delegate(".category-selected", "click", function(event) {
        $("#category_items").html("<p class='text-center'>Loading...</p>");
        event.preventDefault();
        var cid = $(this).attr('cid');

        $.ajax({
            url: "action.php",
            method: "POST",
            data: { category_selected: 1, cat_id: cid },
            success: function(data) {
                if (data == 'empty') {
                    $("#category_items").html('No products found with this category');
                } else {
                    $("#category_items").html(data);
                    $(this).css({ 'font-size': '18px', 'color': 'red' });
                }
            }

        })

    });
	
</script>
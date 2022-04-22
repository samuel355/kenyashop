<?php include_once "include/head.php" ?>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <?php include_once "include/header.php" ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php include_once "include/sidebar.php" ?>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">All Products</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Products</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php include_once 'include/dash.php' ?>

                <!-- Search Filter -->

                <div class="page-header mt-3">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="form-group form-focus">
                                <input id="search-product" type="text" class="form-control floating">
                                <label class="focus-label">Search Product</label>
                            </div>
                        </div>
                        <div class="col-md-5 float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_product"><i class="fa fa-plus"></i> Add Product</a>
                        </div>
                    </div>
                </div>
                <!-- Search Filter -->

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0"> Products</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Price (GHS.)</th>
                                                <th>Category</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-container">
                                            
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-12"><p class="mt-2 text-center" id="fetch_products_message"></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Product Modal -->
            <div id="add_product" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>

                        <div class="modal-body">
                            <form id="add-product-form" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 text-center alert alert-danger error-message">  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Product Image <span class="text-danger">*</span></label>
                                            <input name="product-image" class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Title</label>
                                            <input name="product-title" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                            <input name="product-price" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Size</label>
                                            <input class="form-control" type="text" name="product-size">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Color</label>
                                            <input class="form-control" type="text" name="product-color">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Category <span class="text-danger">*</span> </label>
                                            <select name="product-category" class="select form-control">
                                                <option selected value="select">Select Category</option>
                                                <?php 
                                                    include_once "php/config.php";
                                                    $sel_cat = "SELECT * FROM categories ORDER BY cat_title ASC";
                                                    $qr_sel_cat = mysqli_query($con, $sel_cat);
                                                    while($row = mysqli_fetch_assoc($qr_sel_cat)){
                                                        echo'
                                                            <option value = "'.$row['cat_title'].'"> '.$row['cat_title'].' </option>
                                                        ';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="product-desc" id="product-desc" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn add-product-btn">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Product Modal -->

            <!-- Delete Product Modal -->
            <div class="modal custom-modal fade" id="delete_product" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Product</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-danger continue-btn confirm-delete">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Product Modal -->

            <!-- Footer -->
            <div class="row">
                <div class="col-12 text-center text-muted mb-3">All Rights Reserved</div>
            </div>

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <script>
        //Autoload Products
        var limit = 7;
        var start = 0;
        var action = 'inactive';

        function load_all_products(limit, start) {
            $.ajax({
                url: 'php/fetch-products.php',
                method: 'POST',
                data: { limit: limit, start: start },
                cache: false,

                success: function(data) {
                    $("#products-container").append(data);
                    if (data == '') {
                        $('#fetch_products_message').html('No available Products');
                        action = 'active'
                    } else {
                        $('#fetch_products_message').html('Please wait...');
                        action = 'inactive'
                    }
                },

                error: function(err) {
                    console.log(err);
                }
            })
        }

        if (action == 'inactive') {
            load_all_products(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $('#products-container').height() && action == 'inactive') {
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_all_products(limit, start);
                }, 1000)
            }
        })

        //Add product
        const form = document.querySelector("#add-product-form"),
        continueBtn = document.querySelector(".add-product-btn")

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        continueBtn.onclick = () =>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/add-product.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data === "success") {
                            alert("Successfully added Product")
                            window.location.reload(true);
                        } else {
                            $('.error-message').html(data);
                            $('.error-message').css('display', 'block').fadeOut(9000);
                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }

        //Search Product
        const searchBar = document.querySelector('#search-product')
        searchedProduct = document.querySelector('#products-container');
        searchBar.onkeyup = () => {
            let searchTerm = searchBar.value;
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/search-product.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        searchedProduct.innerHTML = data;
                        $("#fetch_products_message").css('display', 'none')
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("searchTerm=" + searchTerm);
        }

        //Delete Product
        $('.confirm-delete').on('click', function(e){
            e.preventDefault();
            var product_id = $(this).attr('product-id');
            console.log(product_id);

            $.ajax({
                url: "php/delete-product.php",
                method: "GET",
                data: {product_id: product_id},
                success: function(data){
                    if(data === "success"){
                        alert('Product Deleted Successfully')
                        window.location.reload(true)
                    }else{
                        alert(data);
                        window.location.reload(true);
                    }
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
    </script>
</body>
</html>
<?php include_once "include/head.php" ?>
<?php
    include_once "php/config.php";
    if(isset($_GET['pid'])){
        $product_id = $_GET['pid'];

        //Select product details with id
        $select_pdt = "SELECT * FROM products WHERE product_id = '{$product_id}' ";
        $qr_pdt = mysqli_query($con, $select_pdt);
        $row_pdt = mysqli_fetch_assoc($qr_pdt);
        $product_cat_id = $row_pdt['product_cat'];
        $product_cat_title = $row_pdt['product_cat_title'];
        $product_title = $row_pdt['product_title'];
        $product_price = $row_pdt['product_price'];
        $product_desc = $row_pdt['product_desc'];
        $product_image = $row_pdt['product_image'];
        $product_size = $row_pdt['size'];
        $product_color = $row_pdt['color'];

    }
?>
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
                            <h3 class="page-title">Edit Product</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                <div class="dash-widget-info">
                                    <h3>112</h3>
                                    <span>Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                                <div class="dash-widget-info">
                                    <h3>44</h3>
                                    <span>Revenue</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-shopping-bag"></i></span>
                                <div class="dash-widget-info">
                                    <h3>37</h3>
                                    <span>Orders</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                                <div class="dash-widget-info">
                                    <h3>218</h3>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="modal-body p-5 bg-white shadow rounded-1">
                            <form id="product-update-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 text-center alert alert-danger error-message">  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img border">
                                            <img class="inline-block" src="../product_images/<?php echo $product_image ?>" alt="">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Change Product Image<span class="text-danger">*</span></label>
                                                    <input name="product-image" id="product-image" class="form-control" type="file">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Title</label>
                                                    <input name="product-title" id="product-title" value="<?php echo $product_title ?>" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $product_id ?>" name="product-id">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                                    <input id="product-price" name="product-price" value="<?php echo $product_price ?>" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Category <span class="text-danger">*</span> </label>
                                                    <select name="product-category" id="product-category" class="select form-control">
                                                        <option selected value="<?php echo $product_cat_title ?>"><?php echo $product_cat_title ?></option>
                                                        <?php
                                                            include_once "php/config.php";

                                                            //Fetch all categories from database
                                                            $fetch_cat = "SELECT * FROM categories";
                                                            $qr_fetch_cat = mysqli_query($con, $fetch_cat);
                                                            while($row_cat = mysqli_fetch_assoc($qr_fetch_cat)){
                                                                echo '<option value="'.$row_cat['cat_title'].'">'.$row_cat['cat_title'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Size <span class="text-danger">*</span></label>
                                                    <input id="product-size" name="product-size" value="<?php echo $product_size ?>" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Color <span class="text-danger">*</span></label>
                                                    <input id="product-color" name="product-color" value="<?php echo $product_color ?>" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="product-desc" id="product-desc" cols="30" rows="4"> <?php echo $product_desc ?> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary product-update-btn submit-btn">Update</button>
                                </div>
                            </form>
						</div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

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
        const form = document.querySelector("#product-update-form"),
        continueBtn = document.querySelector(".product-update-btn")

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        continueBtn.onclick = () =>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/update-product.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data === "success") {
                            alert("Successfully updated Product")
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

    </script>
</body>
</html>
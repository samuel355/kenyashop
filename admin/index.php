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
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome Admin!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

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
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Recent Products</h3>
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
                                        <tbody>
                                            <?php
                                                include_once "php/config.php";
                                                $sel_products = "SELECT * FROM products ORDER BY product_id DESC LIMIT 5 ";
                                                $query_sel_products = mysqli_query($con, $sel_products);
                                                $output = " ";
                                                if(mysqli_num_rows($query_sel_products) <= 0){
                                                    $output .= "No products have been added yet";
                                                }else{
                                                    while($row = mysqli_fetch_assoc($query_sel_products)){
                                                        $product_id = $row['product_id'];
                                                        $product_cat_id = $row['product_cat'];
                                                        $product_cat_title = $row['product_cat_title'];
                                                        $product_title = $row['product_title'];
                                                        $product_price = $row['product_price'];
                                                        $product_image = $row['product_image'];
                                                        $product_color = $row['color'];
                                                        $product_size = $row['size'];
                                            
                                                        $output .='
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="edit-product.php?pid='.$product_id.'">
                                                                            <img style="width: 50px; height: 50px; object-fit: contain" alt="" src="../product_images/'.$product_image.'">
                                                                        </a>
                                                                    </h2>
                                                                </td>
                                                                <td> <a href="edit-product.php?pid='.$product_id.'"> '.$product_title.' </a> </td>
                                                                <td>'.number_format($product_price).'</td>
                                                                <td>
                                                                    ' .$product_cat_title.'
                                                                </td>
                                                                <td>'.$product_color.'</td>
                                                                <td>'.$product_size.'</td>
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item edit-product" href="edit-product.php?pid='.$product_id.'"> <i class="fa fa-pencil m-r-5"></i> Edit </a>
                                                                            <a class="dropdown-item delete-product" data-id="'.$product_id.'" href="#" data-toggle="modal" data-target="#delete_product"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        ';
                                                    }
                                                }

                                                echo $output;
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="products.php">View all Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Recent Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Samue Osei Adu
                                                </td>
                                                <td>barrycuda@example.com</td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    1750
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Samue Osei Adu
                                                </td>
                                                <td>barrycuda@example.com</td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    1750
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Samue Osei Adu
                                                </td>
                                                <td>barrycuda@example.com</td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    1750
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Samue Osei Adu
                                                </td>
                                                <td>barrycuda@example.com</td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    1750
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Samue Osei Adu
                                                </td>
                                                <td>barrycuda@example.com</td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    1750
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Samue Osei Adu
                                                </td>
                                                <td>barrycuda@example.com</td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    1750
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="#">View all Orders</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

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

</body>

</html>
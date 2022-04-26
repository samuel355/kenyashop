<?php include_once "include/head.php" ?>
<?php
    session_start();
    if($_SESSION['user'] != 'admin'){
        header('location: ../index.php');
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

                <?php include_once 'include/dash.php' ?>

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
                                                <th>Order ID</th>
                                                <th>User Details</th>
                                                <th>Quantity</th>
                                                <th>Total (GHS.)</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include_once "php/config.php";
                                                $query = "SELECT * FROM orders_info ORDER BY order_id DESC LIMIT 5";
                                                $output = ' ';
                                                $query_data = mysqli_query($con, $query);
                                                if(mysqli_num_rows($query_data) == 0 ){
                                                    $output .= '
                                                        <tr colspan = "3">
                                                            <td>No Orders have been make yet</td>
                                                        </tr>
                                                    ';
                                                }else{
                                                    while($row = mysqli_fetch_assoc($query_data)){
                                                        $order_id = $row['order_id'];
                                                        $firstname = $row['firstname'];
                                                        $lastname = $row['lastname'];
                                                        $total_qty = $row['total_qty'];
                                                        $total_price = $row['total_price'];
                                                        $reference_code = $row['reference_code'];
                                                        $status = $row['status'];
                                                        $order_date = $row['order_date'];

                                                        $output .= '
                                                            <tr>
                                                                <td>
                                                                    <h2 >
                                                                        <a href="order-details.php?ord_id='.$reference_code.'"> '.$reference_code.' </a>
                                                                    </h2>
                                                                </td>
                                                                <td>'.$firstname." ".$lastname.'</td>
                                                                <td>'.$total_qty.'</td>
                                                                <td>'.$total_price.'</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">'.$status.'</a>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                <a href="orders.php">View all Orders</a>
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
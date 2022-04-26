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
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">All Orders</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Orders</li>
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
                                <input type="text" class="form-control floating">
                                <label class="focus-label">Search Orders</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Filter -->

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0"> Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>User Details</th>
                                                <th>Total Quantity</th>
                                                <th>Total (GHS.)</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include_once "php/config.php";
                                                $query = "SELECT * FROM orders_info";
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
                                                                    '.$order_date.'
                                                                </td>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Client Modal -->
            <div id="add_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Product Image <span class="text-danger">*</span></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Title</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Category <span class="text-danger">*</span> </label>
                                            <select class="select form-control">
                                                <option>Men Wear</option>
                                                <option>Women Wear</option>
                                                <option>Women Bag</option>
                                                <option>Men Bag</option>
                                                <option>Men Bag</option>
                                                <option>Sneakers</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Client Modal -->

            <!-- Edit Client Modal -->
            <div id="edit_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="profile-img-wrap edit-img">
                                            <img class="inline-block" src="assets/img/profiles/avatar-02.jpg" alt="user">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Change Image <span class="text-danger">*</span></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Title</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Category <span class="text-danger">*</span> </label>
                                            <select class="select form-control">
                                                <option>Men Wear</option>
                                                <option>Women Wear</option>
                                                <option>Women Bag</option>
                                                <option>Men Bag</option>
                                                <option>Men Bag</option>
                                                <option>Sneakers</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Client Modal -->

            <!-- Delete Client Modal -->
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
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
                                        <a href="javascript:void(0);" class="btn btn-danger continue-btn">Delete</a>
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
            <!-- /Delete Client Modal -->

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

</body>

</html>
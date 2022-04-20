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
                            <h3 class="page-title">All Orders</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Orders</li>
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
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Price (GHS.)</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img style="width: 40px; height: 40px; object-fit: cover" alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                    </h2>
                                                </td>
                                                <td>Quality Men Shoe</td>
                                                <td>250</td>
                                                <td>
                                                    Women Bags
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">Pending</a>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img style="width: 40px; height: 40px; object-fit: cover" alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                    </h2>
                                                </td>
                                                <td>Quality Men Shoe</td>
                                                <td>250</td>
                                                <td>
                                                    Women Bags
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">Pending</a>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img style="width: 40px; height: 40px; object-fit: cover" alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                    </h2>
                                                </td>
                                                <td>Quality Men Shoe</td>
                                                <td>250</td>
                                                <td>
                                                    Women Bags
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">Pending</a>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img style="width: 40px; height: 40px; object-fit: cover" alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                    </h2>
                                                </td>
                                                <td>Quality Men Shoe</td>
                                                <td>250</td>
                                                <td>
                                                    Women Bags
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">Pending</a>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img style="width: 40px; height: 40px; object-fit: cover" alt="" src="assets/img/profiles/avatar-19.jpg"></a>
                                                    </h2>
                                                </td>
                                                <td>Quality Men Shoe</td>
                                                <td>250</td>
                                                <td>
                                                    Women Bags
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">Pending</a>
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
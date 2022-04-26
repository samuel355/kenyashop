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
                            <h3 class="page-title">All Categories</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Categories</li>
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
                                <label class="focus-label">Search Category</label>
                            </div>
                        </div>
                        <div class="col-md-5 float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_category"><i class="fa fa-plus"></i> Add Category</a>
                        </div>
                    </div>
                </div>
                <!-- Search Filter -->

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include_once "php/config.php";
                                                $sel_cat = "SELECT * FROM categories";
                                                $query_sel_cat = mysqli_query($con, $sel_cat);
                                                $output = " ";
                                                if(mysqli_num_rows($query_sel_cat) <= 0 ){
                                                    $output .= " No categories";
                                                }else{
                                                    $i = 0;
                                                    while($row = mysqli_fetch_assoc($query_sel_cat)){
                                                        $i++;
                                                        $cat_id = $row['cat_id'];
                                                        $cat_title = $row['cat_title'];
                                                        $output .= '
                                                            <tr>
                                                                <td>'.$i.'</td>
                                                                <td>'.$cat_title.'</td>
                                                                
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item edit-category" data-id = " '.$cat_id.' " href="#" data-toggle="modal" data-target="#edit_category"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                            <a class="dropdown-item delete-category" href="#" data-id = " '.$cat_id.' "  data-toggle="modal" data-target="#delete_category"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

            <!-- Add Category Modal -->
            <div id="add_category" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
                        </div>
                        <div class="modal-body">
                            <form id="add-category-form" method="POST">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 col-12 text-center error-text alert alert-danger"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Title</label>
                                            <input name="cat_title" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn add-cat-btn">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Client Modal -->

            <!-- Edit Category Modal -->
            <div id="edit_category" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form id="edit-cat-form">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 col-12 text-center error-text alert alert-danger"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Title</label>
                                            <input id="category-title" name="category-title" class="form-control" type="text">
                                            <input type="hidden" name="category_id" id="category_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn edit-cat-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Category Modal -->

            <!-- Delete Category Modal -->
            <div class="modal custom-modal fade" id="delete_category" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Category?</h3>
                                <p class="text-danger">Deleting this category will also delete all the products associated with this category. <br> Are you sure you want to proceed?</p>
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
            <!-- /Delete Category Modal -->

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
        $(document).ready(function(){

            //Add Category
            $('#add-category-form').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: 'php/add-cat.php',
                    method: 'POST',
                    data: $('#add-category-form').serialize(),

                    success: function(data){
                        if(data === "success"){
                            alert('Category added successfully');
                            window.location.reload(true);
                        }else{
                            $('.error-text').css('display', 'block');
                            $('.error-text').html(data).fadeOut(9000);
                        }
                    },

                    error: function(err){
                        console.log(err)
                    }
                })
            });

            //Get Category title with onclick
            $('.edit-category').on('click', function(){
                var cat_id = $(this).attr('data-id');
                console.log(cat_id)

                $.ajax({
                    url: 'php/get-cat.php',
                    method: 'GET',
                    data: {cat_id: cat_id},
                    
                    success: function(data){
                        //alert(data)
                        $('#category_id').val(cat_id);
                        $('#category-title').val(data);
                        $('#category-title').text(data);
                    },

                    error: function(err){
                        console.log(err)
                    }
                })
            });

            //Update Category
            $('#edit-cat-form').on('submit', function(e){
                e.preventDefault();
                
                $.ajax({
                    url: 'php/update-cat.php',
                    method: 'POST',
                    data: $('#edit-cat-form').serialize(),

                    success: function(data){
                        if(data === 'success'){
                            alert('Category updated successfully');
                            window.location.reload(true)
                        }else{
                            $('.error-text').css('display', 'block');
                            $('.error-text').html(data);
                        }
                    },

                    error: function(err){
                        console.log(err);
                    }
                })
            })

            //Delete Cart
            $('.delete-category').on('click', function(){
                var cat_id = $(this).attr('data-id');
                $('.confirm-delete').attr('cat-id', cat_id);
            });

            $('.confirm-delete').on('click', function(){
                var cat_id = $(this).attr('cat-id');
                console.log(cat_id);

                $.ajax({
                    url: 'php/delete-cat.php',
                    method: 'GET',
                    data: {cat_id: cat_id},

                    success: function(data){
                        if(data === 'success'){
                            alert('Category deleted successfully');
                            window.location.reload(true);
                        }else{
                            alert (data);
                        }
                    },

                    error: function(err){
                        console.log(err);
                    }
                })
            })
        })
    </script>

</body>

</html>
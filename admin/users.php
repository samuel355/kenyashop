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
                            <h3 class="page-title">All Users</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Users</li>
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
                                <label class="focus-label">Search Users</label>
                            </div>
                        </div>
                        <div class="col-md-5 float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
                        </div>
                    </div>
                </div>
                <!-- Search Filter -->

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0"> Users</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Details</th>
                                                <th>email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Date Joined</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include_once "php/config.php";
                                                $query = "SELECT * FROM users";
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
                                                        $user_id = $row['unique_id'];
                                                        $firstname = $row['firstname'];
                                                        $lastname = $row['lastname'];
                                                        $email = $row['email'];
                                                        $mobile = $row['mobile'];
                                                        $address = $row['address'];
                                                        $date_registered = $row['date_registered'];

                                                        $output .= '
                                                            <tr>
                                                                <td>
                                                                    <h2 >
                                                                        <a href="user-profile.php?user_id='.$user_id.'"> '.$user_id.' </a>
                                                                    </h2>
                                                                </td>
                                                                <td>
                                                                    <h2 >
                                                                        <a href="user-profile.php?user_id='.$user_id.'"> '.$firstname." ".$lastname.'</a>
                                                                    </h2>
                                                                </td>
                                                                <td>'.$email.'</td>
                                                                <td>'.$mobile.'</td>
                                                                <td>
                                                                    '.$address.'
                                                                </td>
                                                                <td>
                                                                    '.$date_registered.'
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
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

            <!-- Add User Modal -->
            <div id="add_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
                        </div>
                        <div class="modal-body">
                            <form id="add-user-form" method="POST">
                                <div class="row">
                                    <div style="display: none;" class="col-12 alert alert-danger text-center error-text"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name</label>
                                            <input name="first-name" id="first-name" class="form-control" type="text">
                                            <span class="text-danger first-name-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name </label>
                                            <input name="last-name" id="last-name" class="form-control" type="text">
                                            <span class="text-danger last-name-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input name="email" id="email" class="form-control" type="email">
                                            <span class="text-danger email-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                            <input name="phone" id="phone" class="form-control" type="number">
                                            <span class="text-danger phone-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Address<span class="text-danger">*</span></label>
                                            <input name="address" id="address" class="form-control" type="text">
                                            <span class="text-danger address-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password<span class="text-danger">*</span></label>
                                            <input name="password" id="password" class="form-control" type="password">
                                            <span class="text-danger password-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Re-enter Password<span class="text-danger">*</span></label>
                                            <input name="re-password" id="re-password" class="form-control" type="password">
                                            <span class="text-danger re-password-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">User Role <span class="text-danger">*</span> </label>
                                            <select id="role" name="role" class="select form-control">
                                                <option value="select">Select</option>
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                            <span class="text-danger role-error"></span>
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
            <!-- /Add User Modal -->

            <!-- Edit User Modal -->
            <div id="edit-user-modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>
                        <div class="edit-modal-body">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit User Modal -->

            <!-- Delete User Modal -->
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
    <script>
        $(document).ready(function(){

            //Add User
            $('#add-user-form').on('click', function(e){
                e.preventDefault()

                if($.trim($('#first-name').val()).length == 0){
                    var errorMsg = "Enter your first name";
                    $('.first-name-error').text(errorMsg);
                    $('#first-name').css('border', '1px solid #e63946')
                }else{
                    errorMsg = ' ';
                    $('.first-name-error').text(errorMsg);
                    $('#first-name').css('border', '1px solid #d3d3d3')
                }
                if($.trim($('#last-name').val()).length == 0){
                    var errorMsg = "Enter your last name";
                    $('.last-name-error').text(errorMsg);
                    $('#last-name').css('border', '1px solid #e63946')
                }else{
                    errorMsg = ' ';
                    $('.last-name-error').text(errorMsg);
                    $('#last-name').css('border', '1px solid #d3d3d3')
                }
                if($.trim($('#email').val()).length == 0){
                    var errorMsg = "Enter your email address";
                    $('.email-error').text(errorMsg);
                    $('#email').css('border', '1px solid #e63946')
                }else{
                    var mail_format = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                    if(!mail_format.test($('#email').val())){
                        errorMsg = 'Invalid Email';
                        $('.email-error').text(errorMsg);
                        $('#email').css('border', '1px solid #e63946');
                    }else{
                        errorMsg = ' ';
                        $('.email-error').text(errorMsg);
                        $('#email').css('border', '1px solid #d3d3d3')
                    }
                }

                if($.trim($('#phone').val()).length == 0){
                    var errorMsg = "Enter your phone number";
                    $('.phone-error').text(errorMsg);
                    $('#phone').css('border', '1px solid #e63946')
                }else{
                    if($.trim($('#phone').val()).length < 10){
                        errorMsg = 'Phone Number must be 10 digits';
                        $('.phone-error').text(errorMsg);
                        $('#phone').css('border', '1px solid #e63946');
                    }else{
                        errorMsg = ' ';
                        $('.phone-error').text(errorMsg);
                        $('#phone').css('border', '1px solid #d3d3d3')
                    }
                }

                if($.trim($('#address').val()).length == 0){
                    var errorMsg = "Enter your address";
                    $('.address-error').text(errorMsg);
                    $('#address').css('border', '1px solid #e63946')
                }else{
                    errorMsg = ' ';
                    $('.address-error').text(errorMsg);
                    $('#address').css('border', '1px solid #d3d3d3')
                }

                if($.trim($('#password').val()).length == 0){
                    var errorMsg = "Enter password";
                    $('.password-error').text(errorMsg);
                    $('#password').css('border', '1px solid #e63946')
                }else{
                    if($.trim($('#password').val()) != $.trim($('#re-password').val())){
                        var errorMsg = "Passwords do not match";
                        $('.password-error').text(errorMsg);
                        $('#password').css('border', '1px solid #e63946')
                        $('.re-password-error').text(errorMsg);
                        $('#re-password').css('border', '1px solid #e63946')
                    }else{
                        if($.trim($('#password').val()).length < 5){
                            var errorMsg = "Passwords must be more than 5 characters";
                            $('.password-error').text(errorMsg);
                            $('#password').css('border', '1px solid #e63946')
                        }else{
                            errorMsg = ' ';
                            $('.password-error').text(errorMsg);
                            $('#password').css('border', '1px solid #d3d3d3')
                            $('.re-password-error').text(errorMsg);
                            $('#re-password').css('border', '1px solid #d3d3d3')
                        }
                    }
                    
                }

                if($.trim($('#role').val()) == 'select'){
                    errorMsg = 'Select user role';
                    $('.role-error').text(errorMsg);
                    $('#role').css('border', '1px solid #d3d3d3')
                }else{
                    errorMsg = '';
                    $('.role-error').text(errorMsg);
                    $('#role').css('border', '1px solid #d3d3d3')
                }

                if($.trim($('#first-name').val()).length == 0 || $.trim($('#last-name').val()).length == 0 || $.trim($('#email').val()).length == 0 || !mail_format.test($('#email').val()) || $.trim($('#phone').val()).length == 0 || $.trim($('#phone').val()).length < 10 || $.trim($('#address').val()).length == 0 || $.trim($('#role').val()) == 'select'){
                    var errMsg = "Check and Fill all fields correctly";
                    $('.error-text').css('display', 'block');
                    $('.error-text').html(errMsg).fadeOut(8000);
                }else{
                    $.ajax({
                        url: 'php/add-user.php',
                        method: 'POST',
                        data: $('#add-user-form').serialize(),

                        success: function(data){
                            if(data === 'success'){
                                alert('User added Successfully');
                                location.href = 'users.php';
                            }else{
                                $('.error-text').css('display', 'block');
                                $('.error-text').html(data).fadeOut(8000);
                            }
                        }
                    })
                }
            })

            //Fetch User to modal
            $('.delete-user').on('click', function(){
                var user_id = $(this).attr('user-id')

                $.ajax({
                    url: 'php/fetch-user-details.php',
                    method: 'GET',
                    data: {user_id: user_id},
                    success: function(data){
                        $('#edit-user-modal').modal('show');
                        $('.edit-modal-body').append(data);
                    }
                })
                
            })

           

        })
        

    </script>

</body>

</html>
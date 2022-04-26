<?php include_once "include/head.php" ?>
<?php
    session_start();
    if($_SESSION['user'] != 'admin'){
        header('location: ../index.php');
    }
?>
<?php
    include_once "php/config.php";
    if(isset($_GET['user_id'])){
        $unique_id = $_GET['user_id'];

        //Select product details with id
        $select = "SELECT * FROM users WHERE unique_id = '{$unique_id}' ";
        $qr_select = mysqli_query($con, $select);
        $row = mysqli_fetch_assoc($qr_select);
        $user_id = $row['unique_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $utype = $row['utype'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        $date_registered = $row['date_registered'];

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
                            <h3 class="page-title">Edit User</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="modal-body p-5 bg-white shadow rounded-1">
                            <form id="update-user-form" method="POST">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 text-center alert alert-danger error-message">  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">First Name</label>
                                                    <input name="first-name" id="first-name" value="<?php echo $firstname ?>" class="form-control" type="text">
                                                    <span class="text-danger first-name-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Last Name</label>
                                                    <input name="last-name" id="last-name" value="<?php echo $lastname ?>" class="form-control" type="text">
                                                    <span class="text-danger last-name-error"></span>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $unique_id ?>" name="unique_id">
                                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                    <input id="email" name="email" value="<?php echo $email ?>" class="form-control" type="email">
                                                    <span class="text-danger email-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <input id="phone" name="phone" value="<?php echo $mobile ?>" class="form-control" type="number">
                                                    <span class="text-danger phone-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">User Role <span class="text-danger">*</span> </label>
                                                    <select id="reole" name="role" class="select form-control">
                                                        <option selected value="<?php echo $utype ?>"><?php echo $utype ?></option>
                                                        <option value="user">User</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                    <span class="text-danger erole-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Address<span class="text-danger">*</span></label>
                                                    <input class="form-control" name="address" id="address" value="<?php echo $address ?>" />
                                                    <span class="text-danger address-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary user-update-btn submit-btn">Update</button>
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
    <script>
        $(document).ready(function(){
            
            //update user
            $("#update-user-form").on("submit", function(e) {
                e.preventDefault();

                if($.trim($('#first-name').val()).length == 0){
                    var errorMsg = "Enter first name";
                    $('.first-name-error').text(errorMsg);
                    $('#first-name').css('border', '1px solid #e63946')
                }else{
                    errorMsg = ' ';
                    $('.first-name-error').text(errorMsg);
                    $('#first-name').css('border', '1px solid #d3d3d3')
                }
                if($.trim($('#last-name').val()).length == 0){
                    var errorMsg = "Enter last name";
                    $('.last-name-error').text(errorMsg);
                    $('#last-name').css('border', '1px solid #e63946')
                }else{
                    errorMsg = ' ';
                    $('.last-name-error').text(errorMsg);
                    $('#last-name').css('border', '1px solid #d3d3d3')
                }
                if($.trim($('#email').val()).length == 0){
                    var errorMsg = "Enter email address";
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
                    var errorMsg = "Enter phone number";
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
                    var errorMsg = "Enter address";
                    $('.address-error').text(errorMsg);
                    $('#address').css('border', '1px solid #e63946')
                }else{
                    errorMsg = ' ';
                    $('.address-error').text(errorMsg);
                    $('#address').css('border', '1px solid #d3d3d3')
                }

                if($.trim($('#first-name').val()).length == 0 || $.trim($('#last-name').val()).length == 0 || $.trim($('#email').val()).length == 0 || !mail_format.test($('#email').val()) || $.trim($('#phone').val()).length == 0 || $.trim($('#phone').val()).length < 10 || $.trim($('#address').val()).length == 0 ){
                    var errMsg = "Check and Fill all fields correctly";
                    $('.error-text').css('display', 'block');
                    $('.error-text').html(errMsg).fadeOut(8000);
                }else{
                    $.ajax({
                        url: 'php/update-user.php',
                        method: 'POST',
                        data: $('#update-user-form').serialize(),

                        success: function(data){
                            if(data === 'success'){
                                alert('User updated Successfully');
                                window.location.reload(true);
                            }else{
                                $('.error-text').css('display', 'block');
                                $('.error-text').html(data).fadeOut(8000);
                            }
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>
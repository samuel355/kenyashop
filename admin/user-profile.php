<?php include_once "include/head.php" ?>
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
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12 d-flex">
                        <div class="modal-body p-5 bg-white shadow rounded-1">
                            <form id="user-update-form">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 text-center alert alert-danger error-message">  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">First Name</label>
                                                    <input name="firstname" id="firstname" value="<?php echo $firstname ?>" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Last Name</label>
                                                    <input name="lastname" id="lastname" value="<?php echo $lastname ?>" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $unique_id ?>" name="unique_id">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                    <input id="email" name="email" value="<?php echo $email ?>" class="form-control" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <input id="phone" name="phone" value="<?php echo $mobile ?>" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Address<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="address" id="address" cols="30" rows="4"> <?php echo $address ?> </textarea>
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
</body>
</html>
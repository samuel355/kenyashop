<?php include_once 'include/head.php' ?>
<body>

<?php
    session_start();
    if(isset($_SESSION['uid'])){
        header('location: index.php');
    }
?>

<?php include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Reset Password</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <form class="card login-form" method="post">
                    <div class="card-body">
                        <div class="title">
                            <h3>New Password</h3>
                            <p>Enter your new password to proceed</p>
                        </div>
                        <div class="error-container" style="display: none;">
                            <p class="alert text-center alert-danger error-text"></p>
                        </div>

                        <div class="form-group input-group">
                            <label for="reg-fn">New Password</label>
                            <input class="form-control" name="password" type="password" id="password" required>
                        </div>
                        <div class="form-group input-group">
                            <label for="reg-fn">Re-enter Password</label>
                            <input class="form-control" name="password" type="password" id="password" required>
                        </div>
                        <div class="button">
                            <button class="btn login-button" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'include/footer.php' ?>

<?php include_once 'include/script.php' ?>
<script src="actions.js"></script>

<script src="javascript/login.js"></script>
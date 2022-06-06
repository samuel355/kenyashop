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
                            <h3>Forgot Password</h3>
                            <p>Enter your email and we will send you instructions on how to reset your password</p>
                        </div>
                        <div class="error-container" style="display: none;">
                            <p class="alert text-center alert-danger error-text"></p>
                        </div>

                        <div class="form-group input-group">
                            <label for="reg-fn">Email</label>
                            <input class="form-control" name="email" type="email" id="email" required>
                        </div>
                        <div class="button">
                            <button class="btn login-button" type="submit">Submit</button>
                        </div>
                        <p class="outer-link">Don't have an account? <a href="register.php">Register here </a>
                            </p>
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
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
                    <h1 class="page-title">Login</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li>Login</li>
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
                            <h3>Login Now</h3>
                            <p>You can login using your social media account or email address.</p>
                        </div>
                        <div class="error-container" style="display: none;">
                            <p class="alert text-center alert-danger error-text"></p>
                        </div>

                        <div class="form-group input-group">
                            <label for="reg-fn">Email</label>
                            <input class="form-control" name="email" type="email" id="email" required>
                        </div>
                        <div class="form-group input-group">
                            <label for="reg-fn">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between bottom-content">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                <label class="form-check-label">Remember me</label>
                            </div>
                            <a class="lost-pass" href="reset-password.php">Forgot password?</a>
                        </div>
                        <div class="button">
                            <button class="btn login-button" type="submit">Login</button>
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
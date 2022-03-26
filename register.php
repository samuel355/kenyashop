<?php include_once 'include/head.php' ?>

<body>

<?php include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Registration</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li>Registration</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="register-form">
                    <div class="title">
                        <h3>No Account? Register</h3>
                        <p>Registration takes less than a minute but gives you full control over your orders.</p>
                    </div>
                   
                    <form action="" method="POST" class="row registration-form">

                        <div class="error-container" style="display: none;">
                            <p class="alert text-center alert-danger error-text"></p>
                        </div>

                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input id="first-name" name="first-name" class="form-control" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input id="last-name" name="last-name" class="form-control" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input id="email" name="email" class="form-control" type="email" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input id="phone" name="phone" class="form-control" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" class="form-control" type="password" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="re-password">Confirm Password</label>
                                <input id="re-password" name="re-password" class="form-control" type="password" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="re-password">Address</label>
                                <input id="address" name="address" class="form-control" type="text" >
                            </div>
                        </div>
                        <div class="button">
                            <button class="btn register-button" type="submit"> Register </button>
                        </div>
                       
                    </form>
                    <p class="outer-link">Already have an account? <a href="login.php">Login Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'include/footer.php' ?>

<a href="#" class="scroll-top">
<i class="lni lni-chevron-up"></i>
</a>

<?php include_once 'include/script.php' ?>
<script src="actions.js"></script>

<script>

    const form = document.querySelector(".registration-form"),
    continueBtn = document.querySelector(".register-button"),
    errorContainer = document.querySelector(".error-container"),
    errorText = document.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    }

    continueBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/register.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    if (data === "success") {
                        location.href = "index.php";
                    } else {
                        errorContainer.style.display = "block";
                        errorText.textContent = data;
                        $('.error-container').fadeOut(6000);
                    }
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
</script>

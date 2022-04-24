<?php include_once 'include/head.php' ?>
<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        header("location: login.php");
    }
?>
<body>

<?php // include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>


<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.php">Shop</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
    include_once "php/config.php";
    if(isset($_SESSION['uid'])){
        $sql = "SELECT * FROM users WHERE user_id='$_SESSION[uid]'";
        $query = mysqli_query($con, $sql);
        $user_row=mysqli_fetch_assoc($query);
    }
?>

<section class="checkout-wrapper section">
    <div class="container">
        <form id="checkout-payment-form">
            <div class="row justify-content-center">
                <div class="col-lg-8 order-detail">
                    <div class="checkout-steps-form-style-1">
                        <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                        <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="row">
                                <div class="row">
                                    <div style="display: none;" class="col-md-12 col-12 text-center error-text mb-1 mt-1 alert alert-danger"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        
                                        <div class="row">
                                            <div class="col-md-6 form-input form">
                                                <label>First Name</label>
                                                <input name="first-name" id="first-name" type="text" value="<?php echo $user_row['firstname'] ?>" >
                                                <span class="text-danger first-name-error"></span>
                                            </div>
                                            <div class="col-md-6 form-input form">
                                                <label>Last Name</label>
                                                <input name="last-name" id="last-name" type="text" value="<?php echo $user_row['lastname'] ?>" >
                                                <span class="text-danger last-name-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="user-unique-id" value="<?php echo $_SESSION['unique_id'] ?>">
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Email Address</label>
                                        <div class="form-input form">
                                            <input name="email" id="email" type="text" value="<?php echo $user_row['email'] ?>" >
                                            <span class="text-danger email-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Phone Number</label>
                                            <div class="form-input form">
                                            <input id="phone" name="phone" type="number" value="<?php echo $user_row['mobile'] ?>" >
                                            <span class="text-danger phone-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        <label>Address</label>
                                        <div class="form-input form">
                                            <input id="address" name="address" type="text" value="<?php echo $user_row['address'] ?>" >
                                            <span class="text-danger address-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>City</label>
                                        <div class="form-input form">
                                            <input id="city" name="city" type="text" placeholder="City">
                                            <span class="text-danger city-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Country</label>
                                        <div class="form-input">
                                            <select class="form-control" name="country" id="country">
                                                <option value="select"> Select Country</option>
                                                <option data-countryCode="GH" value="Ghana (+233)">Ghana (+233)</option>

                                                <optgroup label="Other countries">
                                                    <option data-countryCode="NG" value="Algeria (+234)">Nigeria (+213)
                                                    </option>
                                          
                                                </optgroup>
                                            </select>
                                            <span class="text-danger country-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Region/State</label>
                                        <div class="form-input form">
                                            <select name="region" id="region" class="form-control">
                                                <option value="select">Select Region</option>
                                                <option value="Ashanti">Ashanti</option>
                                                <option value="Ahafo">Ahafo</option>
                                                <option value="Bono">Bono</option>
                                                <option value="Bono East">Bono East</option>
                                                <option value="Western">Western</option>
                                                <option value="Central">Central</option>
                                                <option value="Greater Accra">Greater Accra</option>
                                                <option value="Eastern">Eastern</option>
                                                <option value="Volta">Volta</option>
                                                <option value="Oti">Oti</option>
                                                <option value="Northern">Northern</option>
                                                <option value="North East">North East</option>
                                                <option value="Upper East">Upper East</option>
                                                <option value="Savannah">Savannah</option>
                                                <option value="Upper West">Upper West</option>
                                                <option value="Western North">Western North</option>
                                            </select>
                                            <span class="text-danger region-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 text-center price-table-btn button">
                                    <input type="submit"  class="btn pay-with-stack" value="Proceed to Payment" >
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <?php
                    include_once "php/config.php";
                    if(isset($_SESSION['uid'])){
                        $x=0;
                        $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
                        $query = mysqli_query($con, $sql);

                        while($row=mysqli_fetch_array($query)){
                            $x++;
                            $product_id = $row["product_id"];
                            $product_title = $row["product_title"];
                            $product_price = $row["product_price"];
                            $product_image = $row["product_image"];
                            $cart_item_id = $row["id"];
                            $qty = $row["qty"];
                            $product_price = $qty*$product_price;
                            $total_price=$total_price+$product_price;
                            echo '
                                <input type="hidden" class="form-control"  name="total_count" value="'.$x.'">
                                <input type="hidden" class="form-control"  name="item_name_'.$x.'" value="'.$row["product_title"].'">
                                <input type="hidden" class="form-control"  name="item_number_'.$x.'" value="'.$x.'">
                                <input type="hidden" class="form-control"  name="amount_'.$x.'" value="'.$row["product_price"].'">
                                <input type="hidden" class="form-control"  name="quantity_'.$x.'" value="'.$row["qty"].'">
                            ';
                            $quantity += $row['qty'];
                        }
                    
                    }
                ?>
                <div class="col-lg-4 payment-block" style="display: none;">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p style="display: none;" class="text-center alert alert-danger coupon-error"></p>
                            <p>Apply Coupon to get discount!</p>
                            <div class="single-form form-default">
                                <div class="form-input form">
                                    <input id="coupon" name="coupon" type="text" placeholder="Coupon Code">
                                </div>
                                <div class="button">
                                    <p id="coupon-btn" class="btn"> Apply</p>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title text-center" style="color: #e63946; font-weight: bold">PRICE SUMMARY</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Total Quantity</p>
                                    <p class="price"><?php echo $quantity ?></p>
                                    <input type="hidden" name="quantity" id="quantity" value="<?php echo $quantity ?>">
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Items Price</p>
                                    <p class="price">GHS. <?php echo number_format($total_price) ?></p>
                                    <input type="hidden" name="item_price" id="item_price" value="<?php echo $total_price ?>">
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Delivery</p>
                                    <p class="price">GHS. 20.00</p>
                                    <input type="hidden" name="delivery" id="delivery" value="20">
                                    <input type="hidden" name="discount" id="discount" >
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p style="font-weight: bold; color: #e63946;" class="value">Total Price:</p>
                                    <p style="font-weight: bold; color: #e63946;" class="price">GHS. <?php echo number_format($total_price + 20) ?></p>
                                    <input type="hidden" name="total_price" id="total_price" value="<?php echo $total_price + 20 ?>">
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <input onclick="payWithPaystack()" type="submit" name="checkout-final" class="btn" value="Pay GHS.  <?php echo number_format($total_price +20) ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once 'include/footer.php'  ?>

<?php include_once 'include/script.php' ?>
<script src="actions.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>
    const paymentForm = document.getElementById('checkout-payment-form');
    
    var delivery = Number($("#delivery").val());
    var discount = Number($("#discount").val());
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();
        console.log(delivery);
        console.log(discount)
        //create .env
        const apiKey = "pk_test_7ecb0ab49db164af0b248a6e96e6f44cf9a7491b",  // Replace with your public key

            user_id = '<?php echo $_SESSION['uid'] ?>',
            user_unique_id = '<?php echo $_SESSION['unique_id'] ?>',
            first_name = document.getElementById("first-name").value,
            last_name = document.getElementById("last-name").value,
            email = document.getElementById("email").value,
            phone = document.getElementById("phone").value,
            address = document.getElementById("address").value,
            city = document.getElementById("city").value,
            country = document.getElementById("country").value,
            region = document.getElementById("region").value,
            quantity = document.getElementById("quantity").value,
            item_price = document.getElementById("item_price").value,
        total_price = document.getElementById("total_price").value;

        let handler = PaystackPop.setup({
            key: apiKey, 
            email: email,
            amount: document.getElementById("total_price").value * 100,
            currency: 'GHS',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
                alert('Transaction was not completed, window closed.');
            },

            callback: function(response){
                const data = response.reference;
                //let message = 'Payment complete! Reference: ' + response.reference;
                //alert(message);
                //window.location.href = 'success-payment.php?successPaid='+data;
                $.ajax({
                    method: 'GET',
                    url: 'php/check-pay.php',
                    data: {
                        ref: data,
                        email: email,
                        user_id: user_id,
                        user_unique_id: user_unique_id,
                        first_name: first_name,
                        last_name: last_name,
                        phone: phone,
                        address: address,
                        city: city,
                        country: country,
                        region: region,
                        quantity: quantity,
                        item_price: item_price,
                        delivery: delivery,
                        discount: discount,
                        total_price: total_price,
                    },

                    success: function(data){
                        if(data === 'success'){
                            window.location.href = 'success-payment.php';
                        }else{
                            console.log(data);
                        }
                    }
                })
               
            }
        });
        handler.openIframe();
    }

    //insert order-data
    $('.pay-with-stack').on('click', function(e){
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

        if($.trim($('#city').val()).length == 0){
            var errorMsg = "Enter your city";
            $('.city-error').text(errorMsg);
            $('#city').css('border', '1px solid #e63946')
        }else{
            errorMsg = ' ';
            $('.city-error').text(errorMsg);
            $('#city').css('border', '1px solid #d3d3d3')
        }
        if($.trim($('#country').val()) == 'select'){
            var errorMsg = "Select country";
            $('.country-error').text(errorMsg);
            $('#country').css('border', '1px solid #e63946')
        }else{
            errorMsg = ' ';
            $('.country-error').text(errorMsg);
            $('#country').css('border', '1px solid #d3d3d3')
        }
        if($.trim($('#region').val()) == 'select'){
            var errorMsg = "Select region";
            $('.region-error').text(errorMsg);
            $('#region').css('border', '1px solid #e63946')
        }else{
            errorMsg = ' ';
            $('.region-error').text(errorMsg);
            $('#region').css('border', '1px solid #d3d3d3')
        }

        if($.trim($('#first-name').val()).length == 0 || $.trim($('#last-name').val()).length == 0 || $.trim($('#email').val()).length == 0 || !mail_format.test($('#email').val()) || $.trim($('#phone').val()).length == 0 || $.trim($('#phone').val()).length < 10 || $.trim($('#address').val()).length == 0 || $.trim($('#city').val()).length == 0 || $.trim($('#country').val()) == 'select' || $.trim($('#region').val()) == 'select'){
            var errMsg = "Fill all fields correctly";
            $('.error-text').css('display', 'block');
            $('.error-text').html(errMsg).fadeOut(8000);
        }else{
            $('.payment-block').css('display', 'block');
            $('.order-detail').fadeOut(2000);
        }
    })

    //Apply Coupon
    $('#coupon-btn').on('click', function(){
        $('.coupon-error').css('display', 'block');
        $('.coupon-error').html('Wrong coupon code').fadeOut(5000);
    })
</script>

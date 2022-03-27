<?php include_once 'include/head.php' ?>
<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        header("location: login.php");
    }
?>
<body>

<?php include_once 'include/preloader.php' ?> 

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
        <form>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                        <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        <label>Name</label>
                                        <div class="row">
                                            <div class="col-md-6 form-input form">
                                                <input type="text" value="<?php echo $user_row['firstname'] ?>" >
                                            </div>
                                            <div class="col-md-6 form-input form">
                                                <input type="text" value="<?php echo $user_row['lastname'] ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Email Address</label>
                                        <div class="form-input form">
                                            <input type="text" value="<?php echo $user_row['email'] ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Phone Number</label>
                                            <div class="form-input form">
                                            <input type="text" value="<?php echo $user_row['mobile'] ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        <label>Residential Address</label>
                                        <div class="form-input form">
                                            <input type="text" value="<?php echo $user_row['address'] ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>City</label>
                                        <div class="form-input form">
                                            <input type="text" placeholder="City">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Digital Address</label>
                                        <div class="form-input form">
                                            <input type="text" placeholder="Digital Address ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Country</label>
                                        <div class="form-input form">
                                            <input type="text" placeholder="Country">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-default">
                                        <label>Region</label>
                                        <div class="form-input form">
                                            <input type="text" placeholder="Region">
                                        </div>
                                    </div>
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
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Apply Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Total Quantity</p>
                                    <p class="price"><?php echo $quantity ?></p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Items Price</p>
                                    <p class="price">GHS. <?php echo number_format($total_price) ?></p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Delivery</p>
                                    <p class="price">GHS. 10.00</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p style="font-weight: bold;" class="value">Total Price:</p>
                                    <p style="font-weight: bold;" class="price">GHS. <?php echo number_format($total_price + 10) ?></p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
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
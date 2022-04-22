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
                    <h1 class="page-title">Orders</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="store.php">Shop</a></li>
                    <li>Orders</li> 
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <div class="cart-single-list">
                <?php
                    include_once "php/config.php";
                    $this_user = $_SESSION['uid'];
                    $output = "";

                    $select_orders = "SELECT a.product_id, a.qty, a.items_price, a.delivery, a.discount, a.total_price, a.payment_code, a.status, b.product_image, b.product_title, b.product_price, b.product_id, b.color, b.size, c.reference_code, c.order_date FROM order_products a, products b, orders_info c WHERE a.product_id = b.product_id AND a.payment_code = c.reference_code ";
                    $query_orders = mysqli_query($con, $select_orders);
                    
                    if(mysqli_num_rows($query_orders) < 1){
                        $output .= '
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p>You have not made any order yet visit <a href="store.php">Store </a> to make orders</p>
                                </div>
                            </div>
                        ';
                    }else{
                        $d_row = mysqli_fetch_assoc($query_orders);
                        $check_reference = $d_row['reference_code'];

                        $output .= '
                            <h5 class="card-title">Product Details</h5>        
                        ';

                        $output .= '
                            <div class="row">     
                        ';
                        $i=0;
                        $price = 0;
                        while($row = mysqli_fetch_assoc($query_orders)){
                            $i++;
                            $product_image = $row['product_image'];
                            $product_qty = $row['qty'];
                            $total_qty += $product_qty; 
                            $payment_code = $row['payment_code'];
                            $product_title = $row['product_title'];
                            $product_price = $row['product_price'];
                            $items_price = $row['items_price'];
                            $delivery = $row['delivery'];
                            $discount = $row['discount'];
                            $total_price = $row['total_price'];
                            $status = $row['status'];
                            $color = $row['color'];
                            $size = $row['size'];
                            $order_date = $row['order_date'];
                            $price = $product_qty * $product_price;


                            $output .= '
                                <div class="col-md-6 col-12">
                                    <div class="mb-3" style="border-bottom: 2px solid #d3d3d3">
                                        <div class="row">
                                            <div class="col-12 text-dark font-weight-bold" style="font-weight: bold; font-size: 14px">'.$i.'</div>
                                        </div>
                                        <a href="javascript:void()">
                                            <img class="img-fluid" style="width: 100px; height: 100px; object-fit: contain; " src="product_images/'.$product_image.'" alt="#"></a>
                                        <p class="product-name mt-3">
                                            <a href="javascript:void()">
                                                '.$product_title.'
                                            </a>
                                        </p>
                                        <p class="product-name mt-3">
                                            Quantity : <em class="text-dark"> '.$product_qty.' </em>
                                        </p>
                                        <p class="product-name mt-3">
                                            Unit Price : <em class="text-dark">GHS. '.$product_price.' </em>
                                        </p>
                                        <p class="product-name mt-3">
                                            Total : <em class="text-dark">GHS. '.$price.' </em>
                                        </p>
                                        <p class="product-name mt-3">
                                            Size : <em class="text-dark"> '.$size.' </em>
                                        </p>
                                        <p class="product-name mt-3">
                                            Color : <em class="text-dark"> '.$color.' </em>
                                        </p>
                                    </div>
                                </div>
                                   
                            ';

                            
                        }
                        $output .= '  </div>';

                        $output .= '
                            <div class="row">
                                <div class="col-md-6 col-12 mt-5">
                                    <h5 class="card-title">Amount Details</h5>
                                    <p class="product-name mt-3">
                                        Total Quantity : <em class="text-dark"> '.$total_qty.' </em>
                                    </p>
                                    <p class="product-name mt-3">
                                        SubTotal: <em class="text-dark"> GHS. '.number_format($items_price).'.00 </em>
                                    </p>
                                    <p class="product-name mt-3">
                                        Delivery : <em class="text-dark"> GHS. '.number_format($delivery).'.00 </em>
                                    </p>
                                    <p class="product-name mt-3">
                                        Discount : <em class="text-dark"> GHS. '.number_format($discount).'.00 </em>
                                    </p>
                                    <p class="product-name mt-3">
                                        Total Price : <em class="text-dark"> GHS. '.number_format($total_price).'.00 </em>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 mt-5">
                                    <h5 class="card-title">Order Details</h5>
                                    <p>Order Date: <em class="text-dark"> '.$order_date.'</em> </p>
                                    <p class="product-name mt-3">
                                        Order ID : <em class="text-dark"> '.$payment_code.' </em>
                                    </p>
                                    <p class="product-name mt-3">
                                        Reference Code : <em class="text-dark"> '.$payment_code.'</em>
                                    </p>
                                    <p class="product-name mt-3">
                                        Status : <em class="text-dark"> '.$status.' </em>
                                    </p>
                                </div>
                            </div>
                        ';
                        
                    }
                    echo $output;
                ?>
                
            </div>
        </div>
    </div>
</div>

<?php include_once 'include/footer.php'  ?>

<?php include_once 'include/script.php' ?>
<script src="actions.js"></script>
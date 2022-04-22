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
        <?php
            include_once "php/config.php";
            $this_user = $_SESSION['uid'];
            $output = "";

            $query_ref = "SELECT * FROM orders_info WHERE user_id = '{$this_user}' ";
            $ref_data = mysqli_query($con, $query_ref);

            if(mysqli_num_rows($ref_data) == 0 ){
                $output .= '
                    <div class="cart-list-head mb-4">
                        <div class="cart-single-list">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p>You have not made any order yet visit <a href="store.php">Store </a> to make orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }else{
                while($ref_code = mysqli_fetch_assoc($ref_data)){
                    $success_ref = $ref_code['reference_code'];
                            
                    $select_orders = "SELECT a.product_id, a.qty, a.items_price, a.delivery, a.discount, a.total_price, a.status, a.order_date, a.order_id, a.payment_code, b.product_id, b.product_image, b.product_title, b.product_price, b.color, b.size FROM order_products a, products b WHERE a.product_id = b.product_id AND payment_code = '{$success_ref}' AND user_id = '{$this_user}' ";
                    $query_orders = mysqli_query($con, $select_orders);

                    if(mysqli_num_rows($query_orders) == 0 ){
                        $output .= '
                            <div class="cart-list-head mb-4">
                                <div class="cart-single-list">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <p>You have not made any order yet visit <a href="store.php">Store </a> to make orders</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }else{
                        $i=0;
                        $price = 0;
                        $total_qty = 0;

                        $output .= '
                            <div class="cart-list-head mb-3">
                                <div class="cart-single-list">
                                    <h5 class="card-title text-center">Product Details</h5>   
                                    <div class="row mt-3 mb-3">  
                        ';

                        while($row = mysqli_fetch_assoc($query_orders)){
                            $product_id = $row['product_id'];
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
                                <div class="col-md-6 col-sm-12 col-12" style="border-right: 1px dashed #d3d3d3;">
                                    <div class="row">
                                        <div class="col-md-1 text-dark font-weight-bold" style="font-weight: bold; font-size: 14px">
                                            '.$i.'
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:void()">
                                                <img class="img-fluid" style="width: 100px; height: 100px; object-fit: contain; " src="product_images/'.$product_image.'" alt="#">
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="product-name">
                                                <a href="javascript:void()">
                                                    '.$product_title.'
                                                </a>
                                            </p>
                                            <p class="product-name mt-2">
                                                Size : <em class="text-dark"> '.$size.' </em>
                                            </p>
                                            <p class="product-name mt-2">
                                                Color : <em class="text-dark"> '.$color.' </em>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="product-name">
                                                Quantity : <em class="text-dark"> '.$product_qty.' </em>
                                            </p>
                                            <p class="product-name mt-2">
                                                Unit Price : <em class="text-dark">GHS. '.$product_price.' </em>
                                            </p>
                                            <p class="product-name mt-2">
                                                Total : <em class="text-dark">GHS. '.$price.' </em>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        $output .= '
                            <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 mt-2">
                                    <h5 class="card-title">Amount Details</h5>
                                    <p class="product-name mt-2">
                                        Total Quantity : <em class="text-dark"> '.$total_qty.' </em>
                                    </p>
                                    <p class="product-name mt-2">
                                        SubTotal: <em class="text-dark"> GHS. '.number_format($items_price).'.00 </em>
                                    </p>
                                    <p class="product-name mt-2">
                                        Delivery : <em class="text-dark"> GHS. '.number_format($delivery).'.00 </em>
                                    </p>
                                    <p class="product-name mt-2">
                                        Discount : <em class="text-dark"> GHS. '.number_format($discount).'.00 </em>
                                    </p>
                                    <p class="product-name mt-2">
                                        Total Price : <em class="text-dark"> GHS. '.number_format($total_price).'.00 </em>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <h5 class="card-title">Order Details</h5>
                                    <p>Order Date: <em class="text-dark"> '.$order_date.'</em> </p>
                                    <p class="product-name mt-2">
                                        Order ID : <em class="text-dark"> '.$payment_code.' </em>
                                    </p>
                                    <p class="product-name mt-2">
                                        Reference Code : <em class="text-dark"> '.$payment_code.'</em>
                                    </p>
                                    <p class="product-name mt-2">
                                        Status : <em class="text-dark"> '.$status.' </em>
                                    </p>
                                </div>
                            </div>

                        ';
                        $output .= ' 
                                </div>
                            </div>'
                        ;
                    }
                }

                
            }

            echo $output;
        ?>



                
                    


                
      

    </div> 
</div>

<?php include_once 'include/footer.php'  ?>

<?php include_once 'include/script.php' ?>
<script src="actions.js"></script>
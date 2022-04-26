<?php
    include_once "php/config.php";

    //number of products
    $pdt = "SELECT COUNT(*) AS num_of_products FROM products";
    $qr_pdt = mysqli_query($con, $pdt);
    $row_pdt = mysqli_fetch_assoc($qr_pdt);

    //total amount of orders
    $ord = "SELECT * FROM orders_info";
    $qr_ord = mysqli_query($con, $ord);
    $total_revenue = 0;
    while($row_ord = mysqli_fetch_assoc($qr_ord)){
        $total_revenue += $row_ord['items_price'];
    }

    //number of orders
    $ord = "SELECT COUNT(*) AS num_of_orders FROM orders_info";
    $qr_ord = mysqli_query($con, $ord);
    $row_ord = mysqli_fetch_assoc($qr_ord);

    //number of orders
    $users = "SELECT COUNT(*) AS num_of_users FROM users";
    $qr_users = mysqli_query($con, $users);
    $row_users = mysqli_fetch_assoc($qr_users);
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                <div class="dash-widget-info">
                    <h3><?php echo $row_pdt['num_of_products'] ?></h3>
                    <span>Products</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-cedis">₵ </i></span>
                <div class="dash-widget-info">
                    <h3><?php echo number_format($total_revenue) ?>.00</h3>
                    <span>Revenue</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-shopping-bag"></i></span>
                <div class="dash-widget-info">
                    <h3><?php echo $row_ord['num_of_orders'] ?></h3>
                    <span>Orders</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                <div class="dash-widget-info">
                    <h3><?php echo $row_users['num_of_users'] ?></h3>
                    <span>Users</span>
                </div>
            </div>
        </div>
    </div>
</div>
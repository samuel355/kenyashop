<?php
    include_once "config.php";
    $output = '';
    if(isset($_GET['update_ref'])){
        $update_ref = $_GET['update_ref'];
        $order_status = $_GET['order_status'];
        
        
        $update = "UPDATE orders_info a, orders b, order_products c  SET a.status = '{$order_status}', b.status = '{$order_status}', c.status = '{$order_status}' WHERE a.reference_code = '{$update_ref}' AND  b.reference_code = '{$update_ref}' AND c.payment_code = '{$update_ref}'";
        //$update = "UPDATE orders_info SET status = '{$order_status}' WHERE reference_code = '{$update_ref}' ";
        $qr_update = mysqli_query($con, $update);
        if($qr_update){
            echo "success";
        }else{
            echo "Sorry something went wrong updating the status";
        }
        
    }else{
        header('location: orders.php');
    }

    echo $output;
?>
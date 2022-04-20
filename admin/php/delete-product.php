<?php
    include_once "config.php";

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        
        $qr_delete = "DELETE FROM products WHERE product_id = '{$product_id}' ";
        $query_delete = mysqli_query($con, $qr_delete);
        if($query_delete){
            echo 'success';
        }else{
            echo "Sorry error occurred";
        }
    }
?>
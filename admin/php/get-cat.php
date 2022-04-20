<?php
    include_once "config.php";

    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];

        $qr_select = "SELECT * FROM categories WHERE cat_id = '{$cat_id}' ";
        $query_select = mysqli_query($con, $qr_select);
        
        $row = mysqli_fetch_assoc($query_select);

        $cat_title = $row['cat_title'];
        
        echo $cat_title;
        
    }
?>
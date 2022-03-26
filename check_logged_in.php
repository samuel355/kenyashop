<?php
    session_start();
    if(isset($_POST["login_user_with_product"]) || isset($_SESSION['uid'])){
        header('location: checkout.php');
        
    }elseif(isset($_POST["login_user_with_product"]) || !isset($_SESSION['uid'])){
        //this is product list array
        $product_list = $_POST["product_id"];
        //here we are converting array into json format because array cannot be store in cookie
        $json_e = json_encode($product_list);
        //here we are creating cookie and name of cookie is product_list
        setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);
        header('login.php');
    }
?>
?>
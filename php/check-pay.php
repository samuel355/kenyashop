<?php
    if(!isset($_GET['ref'])){
        header('location: ../error-payment.php');
    }else{
        $reference_code  = $_GET['ref'];
        echo 'success';
    }
?>
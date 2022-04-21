<?php
    session_start();
    include_once "config.php";

    if(isset($_POST['user-unique-id'])){
        $user_unique_id = mysqli_escape_string($con, $_POST['user-unique-id']);
        $firstname = mysqli_escape_string($con, $_POST['first-name']);
        $lastname = mysqli_escape_string($con, $_POST['last-name']);
        $email = mysqli_escape_string($con, $_POST['email']);
        $phone = mysqli_escape_string($con, $_POST['phone']);
        $address = mysqli_escape_string($con, $_POST['address']);
        $city = mysqli_escape_string($con, $_POST['city']);
        $country = mysqli_escape_string($con, $_POST['country']);
        $region = mysqli_escape_string($con, $_POST['region']);
        $total_qty = mysqli_escape_string($con, $_POST['quantity']);
        $items_price = mysqli_escape_string($con, $_POST['item_price']);
        $total_price = mysqli_escape_string($con, $_POST['total_price']);
        $user_id = $_SESSION['uid'];
        
        if(empty($firstname)){
            echo "Enter First Name";
        }else if(empty($lastname)){
            echo "Enter Last Name";
        }else if(empty($email)){
            echo "Enter Email";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Enter correct email";
        }else if(empty($phone)){
            echo "Enter Phone Number";
        }else if($phone < 10){
            echo "Phone number must be 10";
        }else if(empty($address)){
            echo "Enter Address";
        }else if(empty($city)){
            echo "Enter city";
        }else if($country === 'select'){
            echo "Select Country";
        }else if($region === 'select'){
            echo "Enter Region";
        }else{
            echo 'success';
        }
    }
?>
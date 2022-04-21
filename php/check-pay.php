<?php
    //Get all details from form and insert into database
    //Add cart products to orders
    //add cart products to ordered products
    //empty user cart with his unique id and user id.

    session_start();
    include_once "config.php";
    if(!isset($_GET['ref'])){
        header('location: ../error-payment.php');
    }else{
        $reference_code  = $_GET['ref'];
        $email = $_GET['email'];
        $user_id = $_GET['user_id'];
        $user_unique_id = $_GET['user_unique_id'];
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $phone = $_GET['phone'];
        $address = $_GET['address'];
        $city = $_GET['city'];
        $country = $_GET['country'];
        $region = $_GET['region'];
        $quantity = $_GET['quantity'];
        $item_price = $_GET['item_price'];
        $delivery = $_GET['delivery'];
        $discount = $_GET['discount'];
        $total_price = $_GET['total_price'];

        if(empty($reference_code)){
            header('location: ../error-payment.php');
        }else if(empty($email) || empty($user_id) || empty($user_unique_id) || empty($first_name) || empty($last_name) || empty($phone) || empty($address) || empty($city) || empty($country) || empty($region) || empty($quantity) || empty($item_price) || empty($delivery) || empty($total_price)){
            echo 'Some form fields are empty';
        }else{
            //Insert into db
            $order_date = date('y-m-d'). ' At '. date('h:i:s');

            $qr_insert = "INSERT INTO orders_info(user_id, unique_id, firstname, lastname, email, phone, address, city, country, region, total_qty, items_price, delivery, discount, total_price, reference_code, order_date)
                        VALUES('{$user_id}', '{$user_unique_id}', '{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$address}', '{$city}', '{$country}', '{$region}', '{$quantity}', '{$item_price}', '{$delivery}', '$discount', '{$total_price}', '{$reference_code}', '{$order_date}')";
            $query_insert = mysqli_query($con, $qr_insert);
            if($query_insert){
                //Select cart products with this user id and insert into orders
                $qr_select = "SELECT * FROM cart WHERE user_id = '{$user_id}' ";
                $query_select = mysqli_query($con, $qr_select);
                while($row = mysqli_fetch_assoc($query_select)){
                    $cart_id = $row['id'];
                    $cart_product_id = $row['p_id'];
                    $cart_user_id = $row['user_id'];
                    $cart_qty = $row['qty'];

                    $qr_insert1 = "INSERT INTO orders(user_id, unique_id, product_id, qty, reference_code)
                    VALUES('{$cart_user_id}', '{$user_unique_id}', '{$cart_product_id}', '{$cart_qty}', '{$reference_code}')";
                    $query_insert1 = mysqli_query($con, $qr_insert1);

                }

                if($query_insert1){

                    //Select and count products in orders and insert into database(order-products)
                    echo 'success';
                }else{
                    echo 'error inserting into orders';
                }

            }else{
                echo 'error insert order details';
            }
            
        }
    }
?>
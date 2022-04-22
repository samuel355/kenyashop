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

                    $qr_insert1 = "INSERT INTO orders(user_id, unique_id, product_id, qty, reference_code, order_date)
                    VALUES('{$cart_user_id}', '{$user_unique_id}', '{$cart_product_id}', '{$cart_qty}', '{$reference_code}', '{$order_date}')";
                    $query_insert1 = mysqli_query($con, $qr_insert1);

                }

                //Select and count products in orders and insert into database(order-products)
                $select_data = "SELECT a.order_id, a.product_id, a.qty, a.reference_code, a.status, b.user_id, b.unique_id, b.items_price, b.delivery, b.discount, b.total_price, b.reference_code FROM orders a, orders_info b WHERE a.reference_code = b.reference_code AND a.unique_id = '{$user_unique_id}'";
                $query_data = mysqli_query($con, $select_data);

                if(mysqli_num_rows($query_data) > 0){
                    while($details = mysqli_fetch_assoc($query_data)){

                        $order_id = $details['order_id'];
                        $product_id = $details['product_id'];
                        $qty = $details['qty'];
                        $db_reference_code = $details['reference_code'];
                        $status = $details['status'];
                        $db_unique_id = $details['unique_id'];
                        $db_user_id = $details['user_id'];
                        $items_price = $details['items_price'];
                        $db_delivery = $details['delivery'];
                        $db_discount = $details['discount'];
                        $db_total_price = $details['total_price'];

                        //insert into oder products
                        $sql_insert = "INSERT INTO order_products(order_id, product_id, qty, items_price, delivery, discount, total_price, user_id, unique_id, payment_code, status, order_date )
                                VALUES('{$order_id}', '{$product_id}', '{$qty}', '{$items_price}', '{$db_delivery}', '{$db_discount}', '{$db_total_price}', '{$db_user_id}', '{$db_unique_id}', '{$db_reference_code}', '{$status}', '{$order_date}' )";
                        $sql_inserted = mysqli_query($con, $sql_insert);
                        
                    }
                    if($sql_inserted){
                        //delete user cart
                        $delete = "DELETE FROM cart WHERE user_id = '{$user_id}' ";
                        $delete_qr = mysqli_query($con, $delete);
                        echo 'success';
                    }
                }

            }else{
                echo 'error insert order details';
            }
            
        }
    }
?>
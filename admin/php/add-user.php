<?php
    include_once "config.php";
    if(isset($_POST['first-name'])){
        $f_name = mysqli_escape_string($con, $_POST['first-name']);
        $l_name = mysqli_escape_string($con, $_POST['last-name']);
        $email = mysqli_escape_string($con, $_POST['email']);
        $phone = mysqli_escape_string($con, $_POST['phone']);
        $address = mysqli_escape_string($con, $_POST['address']);
        $password = mysqli_escape_string($con, $_POST['password']);
        $role = mysqli_escape_string($con, $_POST['role']);

        $checkmail = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' ");
        if(mysqli_num_rows($checkmail) > 0 ){
            echo 'Email - '.$email.' already exist';
        }else{
            //Insert User Data
            $unique_id = rand(time(), 100000000);
            $encrypt_password = md5($password);
            $date_registered = date('Y-m-d')." "."At"." ".date('h:i:s');

            $qr_insert = "INSERT INTO users(unique_id, firstname, lastname, email, password, mobile, address, date_registered) 
                VALUES('{$unique_id}', '{$f_name}', '{$l_name}', '{$email}', '{$encrypt_password}', '{$phone}', '{$address}', '$date_registered')";
            
            $query_insert = mysqli_query($con, $qr_insert);

            if($query_insert){
                echo 'success';
            }else{
                echo "Sorry something went wrong";
            }
        }
        
    }
?>
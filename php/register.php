<?php
    session_start();
    include_once "config.php";
    
    $fname = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last-name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $re_password = mysqli_real_escape_string($conn, $_POST['re-password']);

    if(empty($fname)){
        echo "Enter your first name";
    }elseif(empty($lname)){
        echo "Enter your last name";
    }elseif(empty($email)){
        echo "Enter your email";
    }elseif(empty($phone)){
        echo "Enter your phone number";
    }elseif(empty($password) && empty($re_password)){
        echo "Enter your password";
    }elseif($password != $re_password){
        echo "Passwords do not match";
    }else{
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - This email already exist!";
        }else{
            $ran_id = rand(time(), 100000000);
            $status = "Active now";
            $encrypt_pass = md5($password);
            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, firstname, lastname, email, phone, password)
            VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$phone}', '{$encrypt_pass}')");
            if($insert_query){
                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id'];
                    echo "success";
                }else{
                    echo "This email address not Exist!";
                }
            }else{
                echo "Something went wrong. Please try signing up again!";
            }
        }
    }
    
?>
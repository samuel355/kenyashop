<?php
    session_start();
    include_once "config.php";
    
    if(isset($_POST['first-name'])){
        $f_name = mysqli_real_escape_string($con, $_POST['first-name']);
        $l_name = mysqli_real_escape_string($con, $_POST['last-name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone= mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $repassword = mysqli_real_escape_string($con, $_POST['re-password']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
    
        if(empty($f_name)){
            echo "Enter your First Name";
        }else if(empty($l_name)){
            echo "Enter your Last Name";
        }else if(empty($email)){
            echo "Enter you email";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Enter you email";
        }else if(empty($phone)){
            echo "Enter your Phone Number";
        }else if(strlen($phone) !=10){
            echo "Your Phone Number must be 10";
        }else if(empty($password) && empty($repassword)){
            echo "Enter your password";
        }else if(empty($password) && empty($repassword)){
            echo "Enter your password";
        }else if(strlen($password) < 5){
            echo "Enter Strong Password";
        }else if(empty($address)){
            echo "Enter your Residential Address";
        }else{
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

                //$qr_insert = "INSERT INTO users(unique_id, firstname, lastname, email, password, mobile, address, date_registered) VALUES('{$unique_id}', '{$f_name}', '{$l_name}', '{$email}', '{$encrypt_password}', '{$phone}', '{$address}', '{$date_registered}')";
                $query_insert = mysqli_query($con, $qr_insert);

                if($query_insert){

                    $select_sql2 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' ");
                    if(mysqli_num_rows($select_sql2) > 0){
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['uid'] = $result['user_id'];
                        $_SESSION['unique_id'] = $result['unique_id'];
                        $ip_add = getenv("REMOTE_ADDR");

                        $sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
                        if(mysqli_query($con,$sql)){
                            echo "success";
                        }
                        
                    }else{
                        echo "This email address not Exist!";
                    }

                }else{
                    echo "Sorry something went wrong";
                }
            }
        }
    }

?>
<?php
/*
    session_start();
    include_once "config.php";
    
    $f_name = mysqli_real_escape_string($con, $_POST['first-name']);
    $l_name = mysqli_real_escape_string($con, $_POST['last-name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone= mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repassword = mysqli_real_escape_string($con, $_POST['re-password']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    if(empty($f_name)){
        echo "Enter your First Name";
    }else if(empty($l_name)){
        echo "Enter your Last Name";
    }else if(empty($email)){
        echo "Enter you email";
    }else if(empty($phone)){
        echo "Enter your Phone Number";
    }else if(strlen($phone) !=10){
        echo "Your Phone Number must be 10";
    }else if(empty($password) && empty($repassword)){
        echo "Enter your password";
    }else if($password != $repassword){
        echo "passwords do not match";
    }else if(empty($address)){
        echo "Enter your Residential Address";
    }else{
        echo "check mail";
        $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - This email- $email already exist!";
        }else{
            echo "new email";
            $unique_id = rand(time(), 100000000);
            $encrypt_pass = md5($password);
            $date_registered = date('Y-m-d')." "."At"." ".date('h:i:s');

            //Insert User Data
            $qr_insert = "INSERT INTO users(unique_id,) VALUES('{$unique_id}')";
            $query_insert = mysqli_query($con, $qr_insert);
            //$insert_query = mysqli_query($con, "INSERT INTO users (unique_id, firstname, lastname, email, password, mobile, address, date_registered)
            //VALUES ({$unique_id}, '{$f_name}', '{$l_name}', '{$email}', '{$encrypt_pass}', '{$phone}', '{$address}', '{$date_registered}')");

            if($insert_insert){
                echo 'inserted';
                $select_sql2 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['uid'] = $result['user_id'];
                    $_SESSION['unique_id'] = $result['unique_id'];
                    $ip_add = getenv("REMOTE_ADDR");

                    $sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
                    if(mysqli_query($con,$sql)){
                        echo "success";
                    }
                    
                }else{
                    echo "This email address not Exist!";
                }
            }else{
                echo "Sorry something went wrong";
            }
        }
    }
*/
?>
<?php
include "config.php";

session_start();

#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 
$email = mysqli_real_escape_string($con, $_POST["email"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);

if(!empty($email) && !empty($password)){
    
    $sql = "SELECT * FROM users WHERE email = '{$email}' ";
    $run_query = mysqli_query($con,$sql);

    $count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_assoc($run_query);
    $utype = $row['utype'];
    $user_pass = md5($password);
    $enc_pass = $row['password'];
    $ip_add = getenv("REMOTE_ADDR");

    //we have created a cookie in login_form.php page so if that cookie is available means user is not login
    
    //if user record is available in database then $count will be equal to 1
    if($count === 1 AND $utype === 'user' AND $user_pass === $enc_pass){
        $_SESSION["uid"] = $row["user_id"];
        $_SESSION["name"] = $row["first_name"];

        $ip_add = getenv("REMOTE_ADDR");

        $sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
        if(mysqli_query($con,$sql)){
            echo "login_success";
            exit;
        }  

    }else if($count === 1 AND $utype === 'admin' AND $user_pass === $enc_pass){
            $_SESSION["uid"] = $row["admin_id"];
            $_SESSION["name"] = $row["admin_name"];
            $ip_add = getenv("REMOTE_ADDR");
            //we have created a cookie in login_form.php page so if that cookie is available means user is not login
            //if user is login from page we will send login_success
            echo "admin_success";
            exit;

        }else{
            echo "Email or Password do not match";
            exit();
        }
}else{
    echo "Enter you email and password";
}

?>
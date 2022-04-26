<?php
    include_once "config.php";
    if(isset($_POST['first-name'])){
        $firstname = mysqli_escape_string($con, $_POST['first-name']);
        $lastname = mysqli_escape_string($con, $_POST['last-name']);
        $email= mysqli_escape_string($con, $_POST['email']);
        $phone = mysqli_escape_string($con, $_POST['phone']);
        $address = mysqli_escape_string($con, $_POST['address']);
        $utype = mysqli_escape_string($con, $_POST['utype']);
        $unique_id = mysqli_escape_string($con, $_POST['unique_id']);

        //update
        $update = "UPDATE users SET firstname = '{$firstname}', lastname = '{$lastname}' email = '{$email}', utype = '{$utype}', mobile = '{$phone}', address = '{$address}' WHERE unique_id = '{$unique_id}' ";
        $qry_update = mysqli_query($con, $update);
        if($qry_update){
            echo 'success';
        }else{
            echo 'sorry error occurred';
        }
    }
?>
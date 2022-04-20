<?php 
    include_once "config.php";

    if(isset($_POST['cat_title'])){
        $cat_title = mysqli_escape_string($con, $_POST['cat_title']);
        if(empty($cat_title)){
            echo 'Add category title';
        }else{
            $insert_ = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
            $query_insert = mysqli_query($con, $insert_);
            if($query_insert){
                echo 'success';
            }else{
                echo 'Sorry error occurred';
            }
        }
    }
?>
<?php
    include_once "config.php";

    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        
        //select cat title to be deleted and use it to delete all the associated products
        $select_qr = "SELECT cat_title FROM categories WHERE cat_id = '{$cat_id}' ";
        $select_query = mysqli_query($con, $select_qr);

        if($select_query){
            $row = mysqli_fetch_assoc($select_query);
            $db_cat_title = $row['cat_title'];

            //Use the the cat title to be deleted to delete all associated products in the products db
            $delete_all = "DELETE FROM products WHERE product_cat_title = '{$db_cat_title}' ";
            $qr_delete_all = mysqli_query($con, $delete_all);

            if($qr_delete_all){

                $delete_qr = "DELETE FROM categories WHERE cat_id = '{$cat_id}' ";
                $delete_query = mysqli_query($con, $delete_qr);
        
                if($delete_query){
                    
                    echo 'success';
                }else{
                    echo 'Sorry something went wrong';
                }
            }else{
                echo 'Error occurred';
            }
            
        }else{
            echo "Sorry error occurred";
        }
    }
?>
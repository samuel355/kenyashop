<?php
    include_once "config.php";

    if(isset($_POST['category-title'])){
        $new_cat_title = mysqli_escape_string($con, $_POST['category-title']);
        $cat_id = mysqli_escape_string($con, $_POST['category_id']);

        if(empty($new_cat_title)){
            echo 'Add Category Title';
        }else{
            //Select db cat_title with cat_id;
            $qr_select = "SELECT * FROM categories WHERE cat_id = '{$cat_id}' ";
            $query_select = mysqli_query($con, $qr_select);
            $row = mysqli_fetch_assoc($query_select);
            $db_cat_title = $row['cat_title'];
            $db_cat_id = $row['cat_id'];

           
            $query_upd = "UPDATE products SET product_cat = '{$db_cat_id}', product_cat_title = '{$new_cat_title}' WHERE product_cat_title = '{$db_cat_title}' ";
            $update = mysqli_query($con, $query_upd);

            if($update){
                $cat_update = "UPDATE categories SET cat_title = '{$new_cat_title}' WHERE cat_title = '{$db_cat_title}' ";
                $cat_updated = mysqli_query($con, $cat_update);

                if($cat_updated){
                    echo 'success';
                }else{
                    echo "Sorry!! and error occurred updating";
                }
            }
        }
    }
?>
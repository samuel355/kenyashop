<?php
    include_once "config.php";
    if(isset($_POST['product-title'])){
        $product_id = mysqli_real_escape_string($con, $_POST['product-id']);
        $product_title = mysqli_real_escape_string($con, $_POST['product-title']);
        $product_price = mysqli_real_escape_string($con, $_POST['product-price']);
        $product_category = mysqli_real_escape_string($con, $_POST['product-category']);
        $product_desc = mysqli_real_escape_string($con, $_POST['product-desc']);
        $product_color = mysqli_real_escape_string($con, $_POST['product-color']);
        $product_size = mysqli_real_escape_string($con, $_POST['product-size']);

        if(empty($product_title)){
            echo "Add Product Title";
        }else if(empty($product_price)){
            echo 'Add Product Price';
        }else if(empty($product_category)){
            echo "Select Product Category";
        }else if(empty($product_desc)){
            echo "Add Product Description";
        }else if(empty($product_color)){
            echo "Add Product Color";
        }else if(empty($product_size)){
            echo "Add Product Size";
        }else{
            
            $img_name = basename($_FILES['product-image']['name']);

            if(!empty($img_name)){
                $tmp_name = $_FILES['product-image']['tmp_name'];
                $image_type = $_FILES['product-image']['type'];
                $image_size = $_FILES['product-image']['size'];

                if($image_type == 'image/jpg' || $image_type == 'image/JPG' || $image_type == 'image/jpeg' || $image_type == 'image/JPEG' || $image_type == 'image/png' || $image_type == 'image/PNG'){
                    if($image_size <= 50000000){
                        $fileName = $img_name;
                        move_uploaded_file($tmp_name, '../../product_images/'.$fileName);

                        //select cat_id with cat_title and use it to insert with product
                        $select_qr = "SELECT cat_id FROM categories WHERE cat_title = '{$product_category}' ";
                        $select_query = mysqli_query($con, $select_qr);
                        $sel_row = mysqli_fetch_assoc($select_query);
                        $cat_id = $sel_row['cat_id'];
 

                        //Update Product Data
                        $update_qr = "UPDATE products SET product_cat = '{$cat_id}', product_title = '{$product_title}', product_cat_title = '{$product_category}', product_price = '{$product_price}', product_desc = '{$product_desc}', product_image = '{$fileName}', size = '{$product_size}', color = '{$product_color}' WHERE product_id = '{$product_id}' ";
                        $update_query = mysqli_query($con, $update_qr);
                
                        if($update_query){
                            echo "success";
                        }else{
                            echo 'Error updating product';
                        }
                    }else{
                        'Image size should be less than 5mb';
                    }
                }else{
                    echo 'Select either jpg, jpeg or png';
                }
                
            }else{

                //select cat_id with cat_title and use it to insert with product
                $select_qr = "SELECT cat_id FROM categories WHERE cat_title = '{$product_category}' ";
                $select_query = mysqli_query($con, $select_qr);
                $sel_row = mysqli_fetch_assoc($select_query);
                $cat_id = $sel_row['cat_id'];

                //update with no image field
                //Update Product Data
                $update_qr = "UPDATE products SET product_cat = '{$cat_id}', product_title = '{$product_title}', product_cat_title = '{$product_category}', product_price = '{$product_price}', product_desc = '{$product_desc}', size = '{$product_size}', color = '{$product_color}' WHERE product_id = '{$product_id}' ";
                $update_query = mysqli_query($con, $update_qr);
        
                if($update_query){
                    echo "success";
                }else{
                    echo 'Error updating product';
                }
            }
    
        }

    }else{
        echo 'Add Product Title';
    }
?>
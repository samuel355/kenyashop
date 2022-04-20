<?php
    session_start();
    include_once "config.php";

    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM products WHERE (product_title LIKE '%{$searchTerm}%' OR product_price LIKE '%{$searchTerm}%' ) ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $product_id = $row['product_id'];
            $product_brand = $row['product_brand'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $product_cat_title = $row["product_cat_title"];
            
            $output .= '
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="edit-product.php?pid='.$product_id.'">
                                <img style="width: 50px; height: 50px; object-fit: contain" alt="" src="../product_images/'.$product_image.'">
                            </a>
                        </h2>
                    </td>
                    <td> <a href="edit-product.php?pid='.$product_id.'"> '.$product_title.' </a> </td>
                    <td>'.number_format($product_price).'</td>
                    <td>
                        ' .$product_cat_title.'
                    </td>
                    <td>'.$product_color.'</td>
                    <td>'.$product_size.'</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item edit-product" href="edit-product.php?pid='.$product_id.'"> <i class="fa fa-pencil m-r-5"></i> Edit </a>
                                <a class="dropdown-item delete-product" data-id="'.$product_id.'" href="#" data-toggle="modal" data-target="#delete_product"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            ';
        }
    }else{
        $output .= '<div class="row mt-3">
                <div class="col-12"> <p class="text-center">No Products found related to your search</p></div>
            </div>
        ';
    }
    echo $output;
    
?>


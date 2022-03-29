<?php
    include_once "config.php";
    if(isset($_POST['limit'], $_POST['start'])){
        $limit = $_POST['limit'];
        $start = $_POST['start'];

        $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT $start, $limit";
        $run_query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($run_query)){
            $pro_id = $row['product_id'];
            $pro_cat = $row['product_cat'];
            $pro_brand = $row['product_brand'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_image = $row['product_image'];
            $cat_name = $row["cat_title"];
            
            echo '
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img style="width 100%; height: 40vh; object-fit: contain" src="product_images/'.$pro_image.'" alt="#">
                            <div class="button">
                                <button pid='.$pro_id.' id="product" class="btn add-to-cart-btn"><i class="lni lni-cart"></i> Add to Cart</button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">'.$cat_name.'</span>
                            <h4 class="title">
                                <a href="product-details.php?p='.$pro_id.'">'.$pro_title.'</a>
                            </h4>
                                <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>GHS. '.$pro_price.'.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

?>
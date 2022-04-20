<?php
    include_once "config.php";
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $product_cat_id = $_GET['product_cat_id'];

        $select_qr = "SELECT * FROM products WHERE product_id = '{$product_id}' ";
        $select_query = mysqli_query($con, $select_qr);

        $qr_selsect = "SELECT * FROM categories";
        $query_select = mysqli_query($con, $qr_selsect);

        while($row = mysqli_fetch_assoc($select_query)){
            $product_image = $row['product_image'];
            $cat_title = $row['cat_title'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_desc = $row['product_desc'];

        }
        echo '
            <form id="update-product-form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="profile-img-wrap edit-img">
                            <img id="product-image" class="inline-block" src="../product_images/'.$product_image.'" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Change Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Title</label>
                            <input name="product-title" value="'.$product_title.'" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="product-price" value="'.$product_price.'">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Category <span class="text-danger">*</span> </label>
                            <input name="product-title" value="'.$product_title.'" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="product-desc" id="product-desc" value="'.$product_desc.'" cols="30" rows="4"> '.$product_desc.' </textarea>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Add</button>
                </div>
            </form>
        ';
    
    }
?>

<script>
    $(document).ready(function(){ 
        //Update Client Detail
        $('#update-product-form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "php/update-product.php",
                data: $("#update-product-form").serialize(),
                method: "POST",

                success: function(data){
                    if (data == "success") {
                        alert("Client Data Updated Successfully");
                        window.location.href = "clients.php";
                    } else {
                        $(".errorMessage").text(data);
                        $(".errorMessage").css("display", "block").fadeOut(6000);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        });

    })
</script>
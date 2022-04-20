<?php include_once 'include/head.php' ?>
<body>

<?php include_once 'include/preloader.php' ?> 

<?php include_once 'include/header.php' ?>


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Product Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="store.php">Shop</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['p'])){
            $prod_id = $_GET['p'];
            $sql = "SELECT * FROM products WHERE product_id = '{$prod_id}' ";
		    $run_query = mysqli_query($con, $sql);
            if($run_query){
                $row = mysqli_fetch_array($run_query);
            }
        }
    ?>
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="product_images/<?php echo $row['product_image'] ?>" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="product_images/<?php echo $row['product_image'] ?>" class="img" alt="#">
                                    <img src="product_images/<?php echo $row['product_image'] ?>" class="img" alt="#">
                                    <img src="product_images/<?php echo $row['product_image'] ?>" class="img" alt="#">
                                    <img src="product_images/<?php echo $row['product_image'] ?>" class="img" alt="#">
                                    <img src="product_images/<?php echo $row['product_image'] ?>" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title"><?php echo $row['product_title'] ?></h2>
                            <p style="display: none;" class="category"><i class="lni lni-tag"></i> Drones:<a href="javascript:void(0)">Action
                                cameras</a></p>
                            <h3 class="price">GHS. <?php echo number_format($row['product_price'] ) ?> .00</h3>
                            <p class="info-text"><?php echo $row['product_desc'] ?></p>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group quantity">
                                            <label for="color">Quantity</label>
                                            <select name="product-quantity" class="form-control product-quantity">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button cart-button">
                                            <button style="width: 100%;" product-id='<?php echo $row['product_id'] ?>' id="details-product" class="btn add-to-cart-btn"><i class="lni lni-cart"></i> Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <li>Capture 4K30 Video and 12MP Photos</li>
                                    <li>Game-Style Controller with Touchscreen</li>
                                    <li>View Live Camera Feed</li>
                                    <li>Full Control of HERO6 Black</li>
                                    <li>Use App for Dedicated Camera Operation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Weight:</span> 35.5oz (1006g)</li>
                                    <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                    <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                    <li><span>Operating Frequency:</span> 2.4GHz</li>
                                    <li><span>Manufacturer:</span> GoPro, USA</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="single-block give-review">
                            <h4>4.5 (Overall)</h4>

                            <button type="button" class="btn review-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Leave a Review
                                </button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">Latest Reviews</h4>
                                <p>....</p>
                                <div style="display: none;" class="single-review">
                                    <img src="assets/images/blog/comment1.jpg" alt="#">
                                    <div class="review-info">
                                        <h4>Awesome quality for the price
                                            <span>Jacob Hammond
                                                </span>
                                        </h4>
                                        <ul class="stars">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" type="text" id="review-name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" type="email" id="review-email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" type="text" id="review-subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="form-control" id="review-rating">
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" id="review-message" rows="8" required></textarea>
                    </div>
                </div>
                <div class="modal-footer button">
                    <button type="button" class="btn">Submit Review</button>
                </div>
            </div>
        </div>
    </div>


<?php include_once "include/footer.php" ?>

<?php include_once "include/script.php" ?>

<script type="text/javascript">
    const current = document.getElementById("current");
    const opacity = 0.6;
    const imgs = document.querySelectorAll(".img");
    imgs.forEach(img => {
        img.addEventListener("click", (e) => {
            //reset opacity
            imgs.forEach(img => {
                img.style.opacity = 1;
            });
            current.src = e.target.src;
            //adding class 
            //current.classList.add("fade-in");
            //opacity
            e.target.style.opacity = opacity;
        });
    });
</script>
<script src="actions.js"></script>
</body>

</html>
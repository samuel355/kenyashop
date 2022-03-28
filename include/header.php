<header class="header navbar-area">

    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>GHS</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.php">All Products</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        <?php
                        
                            include_once "php/config.php";
                            if(isset($_SESSION['uid'])){
                                $sql = "SELECT firstname FROM users WHERE user_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);

                                echo '
                                    <ul class="user-login">
                                        <li class="text-white">
                                            <i class="lni lni-user text-white" ></i>
                                            <a class="text-white user-dropdown-button" id="user-dropdown" href="#">Hello '.$row["firstname"].'</a>
                                            <ul class="user-dropdown user-dropdown-show">
                                                <li><a href="#">Account</a></li>
                                                <li><a href="#">Orders</a></li>
                                                <li><a href="logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                ';
                            }else{
                                echo '
                                    <ul class="user-login">
                                        <li>
                                            <a href="login.php">Sign In</a>
                                        </li>
                                        <li>
                                            <a href="register.php">Register</a>
                                        </li>
                                    </ul>
                                ';
                            }
                        
                        ?>
                        
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle" id="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">

                    <a class="navbar-brand" href="index.php">
                        <h4>Kenya<span>Shop</span></h4>
                    </a>

                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">

                    <div class="main-menu-search">

                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>All</option>
                                        <option value="1">Phones</option>
                                        <option value="2">Laptops</option>
                                        <option value="3">Sneakers</option>
                                        <option value="4">Shirts</option>
                                        <option value="5">Accessories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                        
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items cart-badge qty">0</span>
                                </a>

                                <div class="shopping-item">
                                    <ul class="shopping-list cart-list" id="cart_product">
                                        
                                    </ul>
                                    <div class="bottom">
                                        <div class="button">
                                            <a href="cart.php" class="btn animate">Edit Cart</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container navbar-bottom">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">

                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category" id="get_category_home">
                            <li><a href="product-grids.php">accessories</a></li>
                            <li><a href="product-grids.php">Televisions</a></li>
                            <li><a href="product-grids.php">best selling</a></li>
                            <li><a href="product-grids.php">top 100 offer</a></li>
                            <li><a href="product-grids.php">sunglass</a></li>
                            <li><a href="product-grids.php">watch</a></li>
                            <li><a href="product-grids.php">man’s product</a></li>
                            <li><a href="product-grids.php">Home Audio & Theater</a></li>
                            <li><a href="product-grids.php">Computers & Tablets </a></li>
                            <li><a href="product-grids.php">Video Games </a></li>
                            <li><a href="product-grids.php">Home Appliances </a></li>
                            <li><a href="product-grids.php">Digital Cameras</a></li>
                            <li><a href="product-grids.php">Camcorders</a></li>
                            <li><a href="product-grids.php">Camera Drones</a></li>
                            <li><a href="product-grids.php">Smart Watches</a></li>
                            <li><a href="product-grids.php">Headphones</a></li>
                            <li><a href="product-grids.php">MP3 Players</a></li>
                            <li><a href="product-grids.php">Microphones</a></li>
                            <li><a href="product-grids.php">Chargers</a></li>
                            <li><a href="product-grids.php">Batteries</a></li>
                            <li><a href="product-grids.php">Cables & Adapters</a></li>
                        </ul>
                    </div>


                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.php" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="product-grids.php">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.php" aria-label="Toggle navigation">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</header>
$(document).ready(function() {
    cat();
    cathome();
    brand();
    product();

    producthome();


    //cat() is a funtion fetching category record from database whenever page is load
    function cat() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { category: 1 },
            success: function(data) {
                $("#get_category").html(data);

            }
        })
    }

    function cathome() {
        $.ajax({
            url: "homeaction.php",
            method: "POST",
            data: { categoryhome: 1 },
            success: function(data) {
                $("#get_category_home").html(data);

            }
        })
    }
    //brand() is a funtion fetching brand record from database whenever page is load
    function brand() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { brand: 1 },
            success: function(data) {
                $("#get_brand").html(data);
            }
        })
    }
    //product() is a function fetching product record from database whenever page is load
    function product() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { getProduct: 1 },
            success: function(data) {
                $("#get_product").html(data);
            }
        })
    }
    gethomeproduts();

    function gethomeproduts() {
        $.ajax({
            url: "homeaction.php",
            method: "POST",
            data: { gethomeProduct: 1 },
            success: function(data) {
                $("#get_home_product").html(data);
            }
        })
    }

    function producthome() {
        $.ajax({
            url: "homeaction.php",
            method: "POST",
            data: { getProducthome: 1 },
            success: function(data) {
                $("#get_product_home").html(data);
            }
        })
    }


    /*	when page is load successfully then there is a list of categories when user click on category we will get category id and 
    	according to id we will show products
    */
    $("body").delegate(".category", "click", function(event) {
        $("#get_product").html("<h3>Loading...</h3>");
        event.preventDefault();
        var cid = $(this).attr('cid');

        $.ajax({
            url: "action.php",
            method: "POST",
            data: { get_seleted_Category: 1, cat_id: cid },
            success: function(data) {
                $("#get_product").html(data);
                if ($("body").width() < 480) {
                    $("body").scrollTop(683);
                }
            }
        })

    });


    $("body").delegate(".categoryhome", "click", function(event) {
        $("#get_product").html("<h3>Loading...</h3>");
        event.preventDefault();
        var cid = $(this).attr('cid');

        $.ajax({
            url: "homeaction.php",
            method: "POST",
            data: { get_seleted_Category: 1, cat_id: cid },
            success: function(data) {
                $("#get_product").html(data);
                if ($("body").width() < 480) {
                    $("body").scrollTop(683);
                }
            }
        })

    })

    /*	when page is load successfully then there is a list of brands when user click on brand we will get brand id and 
    	according to brand id we will show products
    */
    $("body").delegate(".selectBrand", "click", function(event) {
            event.preventDefault();
            $("#get_product").html("<h3>Loading...</h3>");
            var bid = $(this).attr('bid');

            $.ajax({
                url: "action.php",
                method: "POST",
                data: { selectBrand: 1, brand_id: bid },
                success: function(data) {
                    $("#get_product").html(data);
                    if ($("body").width() < 480) {
                        $("body").scrollTop(683);
                    }
                }
            })

        })
        /*
        	At the top of page there is a search box with search button when user put name of product then we will take the user 
        	given string and with the help of sql query we will match user given string to our database keywords column then matched product 
        	we will show 
        */
    $("#search_btn").click(function() {
            $("#get_product").html("<h3>Loading...</h3>");
            var keyword = $("#search").val();
            if (keyword != "") {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: { search: 1, keyword: keyword },
                    success: function(data) {
                        $("#get_product").html(data);
                        if ($("body").width() < 480) {
                            $("body").scrollTop(683);
                        }
                    }
                })
            }
        })
        //end


    /*
    	Here #login is login form id and this form is available in index.php page
    	from here input data is sent to login.php page
    	if you get login_success string from login.php page means user is logged in successfully and window.location is 
    	used to redirect user from home page to profile.php page
    */
    $("#login").on("submit", function(event) {
            event.preventDefault();
            $(".overlay").show();
            $.ajax({
                url: "login.php",
                method: "POST",
                data: $("#login").serialize(),
                success: function(data) {
                    if (data == "login_success") {
                        window.location.href = "index.php";
                    } else if (data == "cart_login") {
                        window.location.href = "cart.php";
                    } else {
                        $(".error-container").show();
                        $(".error-text").html(data);
                        $(".overlay").hide();
                    }
                }
            })
        })
        //end

    //Get User Information before checkout
    $("#signup_form").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: "registration.php",
            method: "POST",
            data: $("#signup_form").serialize(),
            success: function(data) {
                $(".overlay").hide();
                if (data == "register_success") {
                    window.location.href = "cart.php";
                } else {
                    $("#signup_msg").html(data);
                }

            }
        })
    })


    $("#offer_form").on("submit", function(event) {
        event.preventDefault();
        $(".overlay").show();
        $.ajax({
            url: "offersmail.php",
            method: "POST",
            data: $("#offer_form").serialize(),
            success: function(data) {
                $(".overlay").hide();
                $("#offer_msg").html(data);

            }
        })
    })

    //Add product to cart from product details page
    $("body").delegate("#details-product", "click", function(e) {
        e.preventDefault();
        var product_id = $(this).attr("product-id");
        var row = $(this).parent().parent().parent();
        var quantity = row.find('.product-quantity').val();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { addToCartFromDetails: 1, product_id: product_id, quantity: quantity },
            success: function(data) {
                count_item();
                getCartItem();
                if (data == 'exist') {
                    alert('Product Already in Cart! View Product in Cart to edit')
                }
            }
        })
    })

    //Get User Information before checkout end here

    //Add Product into Cart
    $("body").delegate("#product", "click", function(event) {
            var pid = $(this).attr("pid");

            event.preventDefault();
            $(".overlay").show();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { addToCart: 1, proId: pid, },
                success: function(data) {
                    count_item();
                    getCartItem();
                    if (data == 'exist') {
                        alert('Product Already in Cart! View Product in Cart to edit')
                    }
                }
            })
        })
        //Add Product into Cart End Here
        //Count user cart items function
    count_item();

    function count_item() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { count_item: 1 },
            success: function(data) {
                $(".cart-badge").html(data);
            }
        })
    }
    //Count user cart items function end

    //Fetch Cart item from Database to dropdown menu
    getCartItem();

    function getCartItem() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { Common: 1, getCartItem: 1 },
            success: function(data) {
                $("#cart_product").html(data);
                net_total();

            }
        })
    }

    //Fetch Cart item from Database to dropdown menu

    /*
    	Whenever user change qty we will immediate update their total amount by using keyup function
    	but whenever user put something(such as ?''"",.()''etc) other than number then we will make qty=1
    	if user put qty 0 or less than 0 then we will again make it 1 qty=1
    	('.total').each() this is loop function repeat for class .total and in every repetition we will perform sum operation of class .total value 
    	and then show the result into class .net_total
    */
    $("body").delegate(".qty", "keyup", function(event) {
            $('#checkout-and-shop-buttons').css({ 'display': 'none' });
            event.preventDefault();
            var row = $(this).parent().parent().parent();
            var price = row.find('.price').val();
            var qty = row.find('.qty').val();
            if (isNaN(qty)) {
                alert('type a number');
            };
            if (qty < 1) {
                alert('quantity must be one or more');
            };
            price = parseInt(price);
            qty = parseInt(qty);
            var total = price * qty;
            row.find('.total').val(total);

            var net_total = 0;
            $('.total').each(function() {
                console.log(($(this).val() - 0));
                net_total += ($(this).val() - 0);
            });

            $('.net_total').html("GHS. " + net_total);

            var update_id = row.find(".update").attr("update_id");

            $.ajax({
                url: "action.php",
                method: "POST",
                data: { updateCartItem: 1, update_id: update_id, qty: qty },
                success: function(data) {
                    $("#cart_msg").html(data);
                    checkOutDetails();
                    $('#checkout-and-shop-buttons').css({ 'display': 'block' });
                }
            })

        })
        //Change Quantity end here 

    /*
    	whenever user click on .remove class we will take product id of that row 
    	and send it to action.php to perform product removal operation
    */


    $("body").delegate(".remove", "click", function(event) {
        var remove = $(this).parent().parent().parent();
        var remove_id = remove.find(".remove").attr("remove_id");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { removeItemFromCart: 1, rid: remove_id },
            success: function(data) {
                $('.cart-badge').html(data);
                checkOutDetails();
            }
        })
    })

    //Remove item from cart dropdown
    $("body").delegate(".remove-from-c", "click", function(event) {
        event.preventDefault();
        var remove = $(this).parent().parent();
        var remove_id = remove.find(".remove-from-c").attr("remove_id");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { removeItemFromC: 1, rid: remove_id },
            success: function(data) {
                $('.cart-badge').html(data);
                getCartItem();
            }
        })
    })


    /*
    	whenever user click on .update class we will take product id of that row 
    	and send it to action.php to perform product qty updation operation
    */
    $("body").delegate(".update", "click", function(event) {
        var update = $(this).parent().parent().parent();
        var update_id = update.find(".update").attr("update_id");
        var qty = update.find(".qty").val();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { updateCartItem: 1, update_id: update_id, qty: qty },
            success: function(data) {
                $("#cart_msg").html(data);
                checkOutDetails();
            }
        })


    })
    checkOutDetails();
    net_total();
    /*
    	checkOutDetails() function work for two purposes
    	First it will enable php isset($_POST["Common"]) in action.php page and inside that
    	there is two isset funtion which is isset($_POST["getCartItem"]) and another one is isset($_POST["checkOutDetials"])
    	getCartItem is used to show the cart item into dropdown menu 
    	checkOutDetails is used to show cart item into Cart.php page
    */
    function checkOutDetails() {
        $('.overlay').show();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { Common: 1, checkOutDetails: 1 },
            success: function(data) {
                $('.overlay').hide();
                $("#cart_checkout").html(data);
                net_total();
            }
        })
    }
    /*
    	net_total function is used to calculate total amount of cart item
    */
    function net_total() {
        var net_total = 0;
        $('.qty').each(function() {
            var row = $(this).parent().parent().parent();
            var price = row.find('.price').val();
            var total = price * $(this).val() - 0;
            row.find('.total').val(total);
        })
        $('.total').each(function() {
            net_total += ($(this).val() - 0);
            console.log(net_total);
        })
        $('.net_total').html("GHS. " + Number(net_total).toLocaleString());
    }

    //Store Products Pagination

    page();

    function page() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { page: 1 },
            success: function(data) {
                $("#pageno").html(data);
            }
        })
    }

    $("body").delegate("#page", "click", function() {
        var pn = $(this).attr("page");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { getProduct: 1, setPage: 1, pageNumber: pn },
            success: function(data) {
                $(".store-products").html(data);
            }
        })
    })
})
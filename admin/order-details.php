<?php include_once "include/head.php" ?>
<?php
    session_start();
    if($_SESSION['user'] != 'admin'){
        header('location: ../index.php');
    }
?>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <?php include_once "include/header.php" ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php include_once "include/sidebar.php" ?>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

         	<!-- Page Content -->
             <div class="content container-fluid">
				
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Order Detail</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Order Detail</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-white">CSV</button>
                                <button class="btn btn-white">PDF</button>
                                <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    include_once "php/config.php";
                                    $output = '';
                                    if(isset($_GET['ord_id'])){
                                        $order_id = $_GET['ord_id'];
                                        
                                        $select = "SELECT * FROM orders_info WHERE reference_code = '{$order_id}' ";
                                        $qr_select = mysqli_query($con, $select);
                                        if(mysqli_num_rows($qr_select) == 0){
                                            header('location: orders.php');
                                        }else{
                                            $row = mysqli_fetch_assoc($qr_select);
                                            $ref_code = $row['reference_code'];
                                            $unique_id = $row['unique_id'];
                                            $firstname = $row['firstname'];
                                            $lastname = $row['lastname'];
                                            $phone = $row['phone'];
                                            $email = $row['email'];
                                            $address = $row['address'];
                                            $city = $row['city'];
                                            $country = $row['country'];
                                            $region = $row['region'];
                                            $ordered_date = $row['order_date'];
                                            $total_qty = $row['total_qty'];
                                            $items_price = $row['items_price'];
                                            $discount = $row['discount'];
                                            $delivery = $row['delivery'];
                                            $total_price = $row['total_price'];

                                            
                                            //Select and combine details 
                                            $select1 = "SELECT a.product_id, a.qty, a.items_price, a.delivery, a.discount, a.total_price, a.status, a.order_date, b.product_id, b.product_image, b.product_title, b.product_price, b.size, b.color FROM order_products a, products b WHERE a.product_id = b.product_id AND payment_code = '{$order_id}' ";
                                            $qr_select1 = mysqli_query($con, $select1);
                                            if(mysqli_num_rows($qr_select1) == 0){
                                                header('location: orders.php');
                                            }else{
                                                $price = 0;
                                                $i = 0;

                                                $output .= '
                                                    <h4 class="payslip-title">Payslip for the month of Feb 2019</h4>
                                                    <div class="row">
                                                ';

                                                while($data = mysqli_fetch_assoc($qr_select1)){
                                                    $i++;
                                                    $product_image = $data['product_image'];
                                                    $product_title = $data['product_title'];
                                                    $product_price = $data['product_price'];
                                                    $color = $data['color'];
                                                    $status = $data['status'];
                                                    $size = $data['size'];
                                                    $order_date = $data['order_date'];
                                                    $product_quantity = $data['qty'];
                                                    $price = $product_quantity * $product_price;
                                                    

                                                    $output .= '
                                                        <div class="col-md-4 m-b-20 text-center">
                                                            <p>'.$i.'</p>
                                                            <img src="../product_images/'.$product_image.'" class="inv-logo" alt="Kenya logo">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="text-dark font-weight-bold">'.$product_title.'</li>
                                                                <li>Color : <span class="font-weight-bold">'.$color.'</span></li>
                                                                <li>Size: <span class="font-weight-bold">'.$size.'</span></li>
                                                                <li>Quantity : <span class="font-weight-bold">'.$product_quantity.'</span></li>
                                                                <li>Unit Price: <span class="font-weight-bold" >GHS. '.number_format($product_price).'.00</span> </li>
                                                                <li>Total Price: <span class="font-weight-bold" >GHS. '.number_format($price).'.00</span> </li>
                                                            </ul>
                                                        </div>
                                                    ';
                                                }

                                                $output .= '
                                                        <div class="col-md-4 m-b-20 float-right">
                                                            <div class="invoice-details">
                                                                <h3 class="text-uppercase">Order ID: #'.$ref_code.'</h3>
                                                                <p>'.$order_date.'</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ';

                                                $output .= '
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <h4 class="m-b-10"><strong>User Details</strong></h4>
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Full Name</strong> <span class="float-right">'.$firstname. " ".$lastname. '</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Phone Number</strong> <span class="float-right">'.$phone.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Email</strong> <span class="float-right">'.$email.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Address</strong> <span class="float-right">'.$address.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>City</strong> <span class="float-right">'.$city.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Country</strong> <span class="float-right">'.$country.'</span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <h4 class="m-b-10"><strong>Amount Details</strong></h4>
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Total Quantity</strong> <span class="float-right">'.$total_qty.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>SubTotal</strong> <span class="float-right">GHS. '.number_format($items_price).'.00</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Delivery Fee</strong> <span class="float-right">GHS. '.number_format($delivery).'.00</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Discount</strong> <span class="float-right">GHS. '.number_format($discount).'.00</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Total Amount Paid </strong> <span class="float-right"><strong>GHS. '.number_format($total_price).'.00</strong></span></td>
                                                                        </tr>
                                                                        <tr class="bg-light">
                                                                            <td><strong>Status </strong> <span class="float-right"><strong>'.$status.'.</strong></span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="modal-btn delete-action">
                                                                    <div class="row">
                                                                        <div class="col-6 text-center">
                                                                            <a href="#" edit-id="'.$order_id.'" class="btn btn-secondary cancel-btn edit-order-main">Update Status</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ';

                                            }
                                        }

                                    }else{
                                        header('location: orders.php');
                                    }

                                    echo $output;
                                ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Client Modal -->
            <div id="add_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Product Image <span class="text-danger">*</span></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Title</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Category <span class="text-danger">*</span> </label>
                                            <select class="select form-control">
                                                <option>Men Wear</option>
                                                <option>Women Wear</option>
                                                <option>Women Bag</option>
                                                <option>Men Bag</option>
                                                <option>Men Bag</option>
                                                <option>Sneakers</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Client Modal -->

            <!-- Edit Order Modal -->
            <div id="edit_order" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Status <span class="text-danger">*</span> </label>
                                            <select id="order_stat" name="order-status" class="select form-control">
                                                <option value="Pending">Pending</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Ready for Delivery">Ready For Delivery</option>
                                                <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn update-order-stat">Update Status</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Order Modal -->

            <!-- Delete Client Modal -->
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Product</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-danger continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Client Modal -->

            <!-- Footer -->
            <div class="row">
                <div class="col-12 text-center text-muted mb-3">All Rights Reserved</div>
            </div>


        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function(){
            $('.edit-order-main').on('click', function(e){
                var edit_id = $(this).attr('edit-id');
                $('#edit_order').modal('show');

                $('.update-order-stat').attr('edit_id', edit_id);
            }); 

            $('.update-order-stat').on('click', function(e){
                e.preventDefault();

                var update_ref = $(this).attr('edit_id');
                var order_status = document.getElementById('order_stat').value;
                console.log(update_ref);
                console.log(order_status);
                
                $.ajax({
                    url: 'php/update-order-status.php',
                    method: 'GET',
                    data: {update_ref: update_ref, order_status: order_status},

                    success: function(data){
                        if(data === 'success'){
                            alert('Order Status Updated successfully');
                            window.location.reload(true);
                        }else{
                            alert (data);
                        }
                    },

                    error: function(err){
                        console.log(err);
                    }
                })
                
            })
        })
    </script>

</body>

</html>
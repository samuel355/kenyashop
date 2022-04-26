<?php
    include_once "config.php";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $query = "SELECT * FROM users WHERE unique_id = '{$user_id}' ";
        $fetch = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($fetch);
        $user_id = $row['user_id'];
        $unique_id = $row['unique_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $utype = $row['utype'];
        $phone = $row['mobile'];
        $address = $row['address'];
        
        echo '
            <form id="update-user-form" method="POST">
                <div class="row">
                    <div style="display: none;" class="col-12 alert alert-danger text-center error-text"></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">First Name</label>
                            <input name="first-name" id="firstname" class="form-control" type="text" value="'.$firstname.'">
                            <span class="text-danger firstname-error"></span>
                        </div>
                    </div>
                    <input type="hidden" name="user-id" value="'.$user_id.'" />
                    <input type="hidden" name="unique-id" value="'.$unique_id.'" />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Last Name </label>
                            <input name="last-name" id="lastname" class="form-control" type="text" value="'.$lastname.'">
                            <span class="text-danger lastname-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                            <input name="email" id="eemail" class="form-control" type="email" value="'.$email.'">
                            <span class="text-danger eemail-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                            <input name="phone" id="ephone" class="form-control" type="number" value="'.$phone.'">
                            <span class="text-danger ephone-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Address<span class="text-danger">*</span></label>
                            <input name="address" id="eaddress" class="form-control" type="text" value="'.$address.'">
                            <span class="text-danger eaddress-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">User Role <span class="text-danger">*</span> </label>
                            <select id="reole" name="role" class="select form-control">
                                <option selected value="'.$utype.'">'.$utype.'</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <span class="text-danger erole-error"></span>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Update</button>
                </div>
            </form>
        ';
    }
?>


<?php
    include 'layout/header.php';
    include './../lib/Vendor.php';
    include "../lib/UserProfile.php";
    Session::checkSession();
?>

<?php 
    $profile = new UserProfile();
    $profileData = $profile->getDataById($userData->id)->fetch_object();

 	$vendor = new Vendor();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vendor_submit'])) {
        $vendorMsg = $vendor->store($_POST);
 	}
 ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Vendor Application Form</h4>
        <div><a href="vendor_app_list.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($vendorMsg)) {
                    echo $vendorMsg;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Applicant Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled value="<?php echo $profileData->name; ?>" name="name"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Applicant Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" value="<?php echo $profileData->email; ?>" name="email" disabled
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="mobile_no" class="form-label">
                                        Applicant Mobile No. <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" value="<?php echo $profileData->mobile_no; ?>" name="mobile_no"
                                        disabled class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="dob" class="form-label">Date of Birth <span
                                            class="text-danger">*</span></label>
                                    <input type="date" value="<?php echo $profileData->dob; ?>" name="dob"
                                        class="form-control" disabled required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="nid" class="form-label">Applicant NID <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="nid" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="shop_name" class="form-label">Vendor/Shop Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="shop_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="shop_address" class="form-label">Shop Address</label>
                                    <textarea class="form-control" name="shop_address" id="shop_address"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button name="vendor_submit" class="btn btn-primary btn-sm px-3" type="submit">Save</button>
                            <a href="vendor_app_form.php" class="btn btn-info btn-sm px-3" type="button">Refresh</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'layout/footer.php';
?>
<?php
    include 'layout/header.php';
    include './../lib/UserProfile.php';
    Session::checkSession();
?>

<?php 
 	$profile = new UserProfile();
     $profileData = $profile->getDataById($userData->id)->fetch_object();
     
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_submit'])) {
        $profileMsg = $profile->update($_POST);
 	}
 ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Profile Update</h4>
        <div><a href="profile_view.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($profileMsg)) {
                    echo $profileMsg;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $profileData->name; ?>" name="name"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" value="<?php echo $profileData->email; ?>" name="email"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="mobile_no" class="form-label">
                                        Mobile No. <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" value="<?php echo $profileData->mobile_no; ?>" name="mobile_no"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="dob" class="form-label">Date of Birth <span
                                            class="text-danger">*</span></label>
                                    <input type="date" value="<?php echo $profileData->dob; ?>" name="dob"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="gender" id="select">
                                        <option disabled>Select</option>
                                        <?php if ($profileData->gender == 'Male') { ?>
                                        <option selected value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <?php } else { ?>
                                        <option value="Male">Male</option>
                                        <option selected value="Female">Female</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Profile Picture</label>
                                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button name="profile_submit" class="btn btn-primary btn-sm px-3"
                                type="submit">Save</button>
                            <a href="profile_edit.php" class="btn btn-info btn-sm px-3" type="button">Refresh</a>
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
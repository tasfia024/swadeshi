<?php
    include 'layout/header.php';
    include "../lib/UserProfile.php";
    Session::checkSession();

	$profile = new UserProfile();
    $profileData = $profile->getDataById($userData->id)->fetch_object();
?>

<!-- Content Body -->
<div class="container-fluid p-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <?php if ($profileData->image) { ?>
                    <img src="<?= BASE_URL . '/uploads/' . $profileData->image; ?>" class="rounded-circle mb-3"
                        alt="Profile Picture" width="150" height="150">
                    <?php } else { ?>
                    <img src="../asset/img/profile/profile.png" class="rounded-circle mb-3" alt="Profile Picture"
                        width="150" height="150">
                    <?php } ?>

                    <h4 class="card-title"><?php echo $profileData->name; ?></h4>
                    <p class="text-muted"><?php echo $userRole; ?></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" scope="row">Full Name</th>
                                <td><?php echo $profileData->name; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><?php echo $profileData->email; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td><?php echo $profileData->mobile_no; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Date of Birth</th>
                                <td><?php echo $profileData->dob; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td><?php echo $profileData->gender; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td><?php echo $profileData->address; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Joined at Swadeshi</th>
                                <td><?php echo date($profileData->created_at); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <?php if ($userType == 2) { ?>
                    <h5 class="card-title">Vendor Information</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" scope="row">Shop Name</th>
                                <td><?php echo $profileData->shop_name; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">NID</th>
                                <td><?php echo $profileData->nid; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Shop Address</th>
                                <td><?php echo $profileData->shop_address; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td><?php echo $profileData->vendor_status == 1 ? 'Pending' : 'Approved'; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                    <div class="text-end">
                        <a href="profile_edit.php" class="btn btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'layout/footer.php';
?>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable(); // Initialize DataTables
});
</script>
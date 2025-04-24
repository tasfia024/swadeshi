<?php
    include 'layout/header.php';
    include "../lib/Vendor.php";
    Session::checkSession();

	$vendor = new Vendor();
?>

<?php
        if(isset($_GET['delId'])){
 			$actionMsg = $vendor->deleteDataById($_GET['delId']);
        }

        if(isset($_GET['userId'])){
 			$actionMsg = $vendor->approveById($_GET['userId']);
        }
    ?>

<!-- Content Body -->
<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Vendor Application List</h4>
        <div><a href="vendor_app_form.php" class="btn btn-primary btn-sm">Apply</a></div>
    </div>
    <hr />
    <!-- Example Content Cards -->
    <div class="row">
        <?php
                if(isset($actionMsg)){
                    echo $actionMsg;
                }
            ?>
        <table id="usersTable" class="display">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Applicant Name</th>
                    <th>Mobile No.</th>
                    <th>NID</th>
                    <th>Date of Birth</th>
                    <th>Vendor Shop</th>
                    <th>Shop Address</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <?php if ($userType == 1) { ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                        $getVendor = $vendor->getData();
                        if($getVendor) {
                            $i = 0;
                            while($row = $getVendor->fetch_assoc()){
                                $i++;
                    ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['mobile_no']; ?></td>
                    <td><?= $row['nid']; ?></td>
                    <td><?= $row['dob']; ?></td>
                    <td><?= $row['shop_name']; ?></td>
                    <td><?= $row['shop_address']; ?></td>
                    <td>
                        <?php 
                            if($row['status'] == 0){
                                echo "Submitted & Pending For Approval";
                            }else{
                                echo "Approved";
                            }
                        ?>
                    </td>
                    <td><?= $row['created_at']; ?></td>

                    <?php if ($userType == 1) { ?>
                    <td>
                        <?php if ($row['status'] == 0) { ?>
                        <a class="btn btn-success btn-sm" title="Approve"
                            onclick="return confirm('Are you sure to approve?'); "
                            href="?userId=<?php echo $row['user_id']?>">
                            <i class="fa fa-check"></i>
                        </a>

                        <a class="btn btn-danger btn-sm" title="Delete"
                            onclick="return confirm('Are you sure to delete'); " href="?delId=<?php echo $row['id']?>">
                            <i class="fa fa-trash"></i>
                        </a>

                        <?php } else { echo 'N/A'; } ?>
                    </td>
                    <?php } ?>
                </tr>
                <?php } } ?>
            </tbody>
        </table>

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
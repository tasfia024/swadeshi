<?php
    include 'layout/header.php';
    include "../lib/SubCategory.php";
    Session::checkSession();

	$subCat = new SubCategory();
?>

<?php
        if(isset($_GET['delId'])){
            $id = $_GET['delId'];
 			$delSubCat = $subCat->deleteDataById($id);
        }
    ?>
<!-- Content Body -->
<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Sub Category List</h4>
        <div><a href="sub_category_add.php" class="btn btn-primary btn-sm">Add</a></div>
    </div>
    <hr />
    <!-- Example Content Cards -->
    <div class="row">
        <?php
                if(isset($delSubCat)){
                    echo $delSubCat;
                }
            ?>
        <table id="usersTable" class="display">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $getSubCat = $subCat->getData();
                        if($getSubCat) {
                            $i = 0;
                            while($row = $getSubCat->fetch_assoc()){
                                $i++;
                    ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['category_name']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td>
                        <?php 
                            if($row['status'] == 0){
                                echo "Inactive";
                            }else{
                                echo "Active";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="sub_category_edit.php?editId=<?php echo $row['id']?>">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete'); "
                            href="?delId=<?php echo $row['id']?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
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
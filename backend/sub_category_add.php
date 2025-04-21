<?php
    include 'layout/header.php';
    include './../lib/Category.php';
    include './../lib/SubCategory.php';
    Session::checkSession();
?>

<?php 
 	$subCat = new SubCategory();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sub_category'])) {
        $subCatMsg = $subCat->store($_POST);
 	}
 ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Add New Sub Category</h4>
        <div><a href="sub_category_list.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($subCatMsg)) {
                    echo $subCatMsg;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" aria-label="Default select example"
                                        required>
                                        <option disabled selected>Select</option>
                                        <?php
                                            $cat = new Category();
                                            $getCat = $cat->getData();
                                            if($getCat){
                                                while ($result = $getCat->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $result['id']; ?>">
                                            <?php echo $result['name']?>
                                        </option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Sub Category</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter sub category"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button name="sub_category" class="btn btn-primary btn-sm px-3" type="submit">Save</button>
                            <a href="sub_category_add.php" class="btn btn-info btn-sm px-3" type="button">Refresh</a>

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

<script>
$(document).ready(function() {
    $('#usersTable').DataTable(); // Initialize DataTables
});
</script>
<?php
    include 'layout/header.php';
    include './../lib/Category.php';
    Session::checkSession();
?>

<?php 
 	$cat = new Category();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category'])) {
        $catMsg = $cat->store($_POST);
 	}
 ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Add New Category</h4>
        <div><a href="category_list.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($catMsg)) {
                    echo $catMsg;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Image/ Logo</label>
                                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <a href="category_add.php" class="btn btn-danger btn-sm px-3" type="button">Cancel</a>
                            <button name="category" class="btn btn-success btn-sm px-3" type="submit">Save</button>
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

<?php
    include 'layout/header.php';
    include './../lib/Category.php';
    include './../lib/SubCategory.php';
    include './../lib/Product.php';
    Session::checkSession();
?>

<?php
        if(!isset($_GET['editId']) || $_GET['editId'] == NULL){
            echo "<script>window.location = 'product_list.php'; </script>";
        }else{
            $id = $_GET['editId'];
        }
    ?>

<?php
        $subCat = new Product();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $updateSubCat = $subCat->update($id, $_POST);
        }
    ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Update Product Category</h4>
        <div><a href="product_list.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($updateSubCat)){
                    echo $updateSubCat;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <?php
                            $getSubCat = $subCat->getDataById($id);
                            if($getSubCat){
                                $result = $getSubCat->fetch_assoc();      
                        ?>
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" aria-label="Default select example"
                                        required>
                                        <option disabled>Select</option>
                                        <?php
                                            $cat = new Category();
                                            $getCat = $cat->getData();
                                            if($getCat){
                                                while ($catItem = $getCat->fetch_assoc()) {
                                        ?>
                                        <option <?php 
                                                if($catItem['id'] == $result['category_id']){ ?> selected="selected"
                                            <?php } ?> value="<?php echo $catItem['id']; ?>">
                                            <?php echo $catItem['name']?>
                                        </option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Sub Category</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?php echo $result['name']; ?>" placeholder="Enter sub category"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button name="sub_category" class="btn btn-success btn-sm px-3"
                                type="submit">Update</button>
                            <a href="javascript:void(0)" onclick="window.location.reload()"
                                class="btn btn-danger btn-sm px-3" type="button">Refresh</a>
                        </div>

                        <?php } ?>
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
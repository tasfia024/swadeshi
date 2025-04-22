<?php
    include 'layout/header.php';
    include './../lib/Category.php';
    include './../lib/SubCategory.php';
    include './../lib/Product.php';
    Session::checkSession();

    $selectedCategoryId = null;
    $selectedSubCategoryId = null;
?>

<?php
        if(!isset($_GET['editId']) || $_GET['editId'] == NULL){
            echo "<script>window.location = 'product_list.php'; </script>";
        }else{
            $id = $_GET['editId'];
        }
    ?>

<?php
        $product = new Product();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $updateProduct = $product->update($id, $_POST);
        }
    ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Update Product</h4>
        <div><a href="product_list.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($updateProduct)) {
                    echo $updateProduct;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <?php
                            $getProduct = $product->getDataById($id);
                            if($getProduct){
                                $editData = $getProduct->fetch_assoc();
                                $selectedCategoryId = $editData['category_id'];
                                $selectedSubCategoryId = $editData['sub_category_id'];    
                        ?>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="product_name" class="form-label">Product Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $editData['product_name']; ?>"
                                        name="product_name" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" id="category_id"
                                        aria-label="Default select example" required>
                                        <option disabled>Select</option>
                                        <?php
                                            $cat = new Category();
                                            $getCat = $cat->getData();
                                            if($getCat){
                                                while ($catItem = $getCat->fetch_assoc()) {
                                        ?>
                                        <option <?php 
                                                if($catItem['id'] == $editData['category_id']){ ?> selected="selected"
                                            <?php } ?> value="<?php echo $catItem['id']; ?>">
                                            <?php echo $catItem['name']?>
                                        </option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="sub_category_id" class="form-label">Sub Category</label>
                                    <select class="form-select" id="sub_category_id" name="sub_category_id" required>
                                        <option disabled selected>Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="product_type" class="form-label">Product Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="product_type" id="select">
                                        <option disabled>Select</option>
                                        <?php if ($editData['product_type'] == 'Featured') { ?>
                                        <option selected value="Featured">Featured</option>
                                        <option value="General">General</option>
                                        <?php } else { ?>
                                        <option value="Featured">Featured</option>
                                        <option selected value="General">General</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Product Image</label>
                                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price <span
                                            class="text-danger">*</span></label>
                                    <input value="<?php echo $editData['price']; ?>" type="number" name="price"
                                        class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="stock_qty" class="form-label">Stock Qty <span class="text-danger">*
                                        </span></label>
                                    <input value="<?php echo $editData['stock_qty']; ?>" type="number" name="stock_qty"
                                        class="form-control" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Product
                                        Description</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                        rows="3"><?php echo $editData['description']; ?></textarea>
                                </div>
                            </div>

                        </div>


                        <div class="float-right">
                            <button name="product_update" class="btn btn-success btn-sm px-3"
                                type="submit">Update</button>
                            <a href="javascript:void(0)" onclick="window.location.reload()"
                                class="btn btn-info btn-sm px-3">Refresh</a>
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

<script>
function loadSubCategories(categoryId, selectedSubCategoryId = null) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_subcategories.php?category_id=' + categoryId + '&selected_id=' + selectedSubCategoryId, true);
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('sub_category_id').innerHTML = this.responseText;
        }
    };
    xhr.send();
}

// Trigger when user changes category
document.getElementById('category_id').addEventListener('change', function() {
    const selectedCategoryId = this.value;
    loadSubCategories(selectedCategoryId);
});

// On page load (edit mode)
window.onload = function() {
    const selectedCategoryId = document.getElementById('category_id').value;
    console.log('categoryIddd', selectedCategoryId);
    const selectedSubCategoryId = '<?php echo $selectedSubCategoryId; ?>';
    if (selectedCategoryId) {
        loadSubCategories(selectedCategoryId, selectedSubCategoryId);
    }
};
</script>
<?php
    include 'layout/header.php';
    include './../lib/Category.php';
    include './../lib/SubCategory.php';
    include './../lib/Product.php';
    Session::checkSession();
?>

<?php 
 	$product = new Product();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_entry'])) {
        $productMsg = $product->store($_POST);
 	}
 ?>

<div class="container-fluid p-3">
    <div class="content-title">
        <h4>Add New Product</h4>
        <div><a href="product_list.php" class="btn btn-warning btn-sm">Back</a></div>
    </div>
    <br>
    <!-- Example Content Cards -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($productMsg)) {
                    echo $productMsg;
                }
            ?>
            <div class="card w-100">
                <div class="card-body">
                    <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="product_name" class="form-label">Product Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="product_name" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="category_id" id="category_id"
                                        aria-label="Default select example" required>
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

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="sub_category_id" class="form-label">Sub Category</label>
                                    <select class="form-select" name="sub_category_id" id="sub_category_id" required>
                                        <option disabled selected>Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="product_type" class="form-label">Product Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="product_type" id="select">
                                        <option disabled selected>Select</option>
                                        <option value="Featured">Featured</option>
                                        <option value="General">General</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Product Image <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="price" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="stock_qty" class="form-label">Stock Qty <span class="text-danger">*
                                        </span></label>
                                    <input type="number" name="stock_qty" class="form-control" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Product
                                        Description</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                            </div>

                        </div>


                        <div class="float-right">
                            <button name="product_entry" class="btn btn-primary btn-sm px-3" type="submit">Save</button>
                            <a href="product_add.php" class="btn btn-info btn-sm px-3" type="button">Refresh</a>
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

<script>
document.getElementById('category_id').addEventListener('change', function() {
    const categoryId = this.value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_subcategories.php?category_id=' + categoryId, true);
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('sub_category_id').innerHTML = this.responseText;
        }
    };
    xhr.send();
});
</script>
<?php
    include 'layout/header.php';
    include "../lib/Product.php";
    Session::checkSession();

	$product = new Product();
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
        <table id="usersTable" class="display">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Price</th>
                    <th>Stock Qty</th>
                    <th>Available Qty</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $getProduct = $product->getData();
                        if($getProduct) {
                            $i = 0;
                            while($row = $getProduct->fetch_assoc()){
                                $i++;
                    ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['product_name']; ?></td>
                    <td>
                        <img src="<?= BASE_URL . '/uploads/' . $row['image']; ?>" width="60px" height="40px">
                    </td>

                    <td><?= $row['category_name']; ?></td>
                    <td><?= $row['sub_category_name']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['stock_qty']; ?></td>
                    <td><?= $row['stock_qty'] - $row['sale_qty']; ?></td>
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
                        <a class="btn btn-success btn-sm" href="product_edit.php?editId=<?php echo $row['id']?>">
                            <i class="fa fa-edit"></i>
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
<?php
    include 'layout/header.php';
    include "../lib/Category.php";
    Session::checkSession();

	$cat = new Category();
?>

    <?php
        if(isset($_GET['delId'])){
            $id = $_GET['delId'];
 			$delCat = $cat->deleteDataById($id);
        }
    ?>
    <!-- Content Body -->
    <div class="container-fluid p-3">
        <div class="content-title">
            <h4>Category List</h4>
            <div><a href="category_add.php" class="btn btn-primary btn-sm">Add</a></div>
        </div>
        <hr/>
        <!-- Example Content Cards -->
        <div class="row">
            <?php
                if(isset($delCat)){
                    echo $delCat;
                }
            ?>
            <table id="usersTable" class="display">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getCat = $cat->getData();
                        if($getCat) {
                            $i = 0;
                            while($row = $getCat->fetch_assoc()){
                                $i++;
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['name']; ?></td>
                            <td>
                                <img src="<?= BASE_URL . '/uploads/' . $row['image']; ?>" width="60px" height="40px">
                            </td>
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
                                <a class="btn btn-success btn-sm" href="productedit.php?pdId=<?php echo $row['id']?>"><i class="fa fa-edit"></i></a>

					            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete'); " href="?delId=<?php echo $row['id']?>">
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

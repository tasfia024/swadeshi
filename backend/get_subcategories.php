<?php
if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];

    // Include SubCategory class and database connection if not autoloaded
    include_once './../lib/SubCategory.php';

    $subCat = new SubCategory();
    $getSubCat = $subCat->getSubCategoriesByCategory($categoryId);

    echo '<option disabled selected>Select</option>';
    if ($getSubCat) {
        while ($result = $getSubCat->fetch_assoc()) {
            echo '<option value="'.$result['id'].'">'.$result['name'].'</option>';
        }
    }
}
?>
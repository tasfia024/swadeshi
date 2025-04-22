<?php
if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $selectedId = isset($_GET['selected_id']) ? $_GET['selected_id'] : null;

    include_once './../lib/SubCategory.php';

    $subCat = new SubCategory();
    $getSubCat = $subCat->getSubCategoriesByCategory($categoryId);

    echo '<option disabled>Select</option>';
    if ($getSubCat) {
        while ($result = $getSubCat->fetch_assoc()) {
            $selected = ($selectedId == $result['id']) ? 'selected' : '';
            echo '<option value="'.$result['id'].'" '.$selected.'>'.$result['name'].'</option>';
        }
    }
}
?>
<?php
    include 'layout/header.php';
    include 'lib/ClientHome.php';

    $homePage = new ClientHome();
?>

<content>
    <!-- product start-->
    <div class="small-container">

        <div class="row">
            <div class="col-md-12">
                <h2>All Products</h2>
                <select name="" id="">
                    <option>Default Sorting</option>
                    <option>Sort by Price</option>
                    <option>Sort by Popularity</option>
                    <option>Sort by Rating</option>
                    <option>Sort by Sale</option>
                </select>
            </div>
        </div>

        <div class="row">
            <?php
                if(isset($_GET['category_id'])){
                    $getProducts = $homePage->relatedProducts($_GET['category_id']);
                } else {
                    $getProducts = $homePage->getAllProducts();
                }


                if($getProducts) {
                    while($product = $getProducts->fetch_assoc()){
            ?>
            <div class="col-4">
                <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $product['image']; ?>"
                    alt="<?= $product['product_name'] ?>">
                <a href="product_details.php?product_id=<?php echo $product['id']?>">
                    <h4><?= $product['product_name'] ?></h4>
                </a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ <?= $product['price'] ?></p>
            </div>
            <?php }} ?>
        </div>
        <div class="page-btn row">
            <div class="text-center">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>&#8594;</span>
            </div>
        </div>
    </div>
</content>

<?php
    include 'layout/footer.php';
?>
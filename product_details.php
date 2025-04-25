<?php
    include 'layout/header.php';
    include 'lib/ClientHome.php';

    $homePage = new ClientHome();
    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL){
        echo "<script>window.location = 'index.php'; </script>";
    }else{
        $productId = $_GET['product_id'];
    }
    
    $getProduct = $homePage->productDetailsById($productId);
    $detailData = $getProduct ? $getProduct->fetch_assoc() : null;
?>

<!-- Single product details start-->

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <!--Large img-->
            <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $detailData['image']; ?>" alt="" width="98%"
                height="448px" id="ProductImg">

            <!--Small img-->
            <!-- <div class="small-img-row">
                <div class="small-img-col">
                    <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $detailData['image']; ?>" width="100%"
                        class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $detailData['image']; ?>" width="100%"
                        class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $detailData['image']; ?>" width="100%"
                        class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $detailData['image']; ?>" width="100%"
                        class="small-img">
                </div>
            </div> -->
        </div>
        <div class="col-2">
            <p>Home / <?php echo $detailData['category_name'] ?></p>
            <h1>
                <?php echo $detailData['product_name'] ?>
                <?php if (isset($detailData['shop_name']) && $detailData['shop_name']) { ?>
                by <?php echo $detailData['shop_name'] ?>'s Shop</h1>
            <?php } ?>

            <div style="font-size: 20px; font-weight: bold">৳ <?php echo $detailData['price'] ?></div>

            <!--Quantity-->
            Stock: <?php echo $detailData['stock_qty'] ?>
            <br>
            <br>
            <!--Cart-->
            <a href="#" class="btn btn-primary btn-sm">Add To Cart</a>
            <!--Product details-->
            <br>
            <br>
            <h5>Description</h5>
            <p><?php echo $detailData['description'] ?></p>

        </div>
    </div>
</div>


<!--Title -->

<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
    </div>
</div>


<!--Product-->
<div class="small-container">

    <div class="row">
        <?php
            $relatedProduct = $homePage->relatedProducts($detailData['category_id']);
            if ($relatedProduct) {
                while($product = $relatedProduct->fetch_assoc()){
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

</div>
<!-- single product details ends -->

<!--JS for toggle menu starts-->

<script>
var MenuIteams = document.getElementById("MenuIteams");
MenuIteams.style.maxHeight = "0px";

function menutoggle() {
    if (MenuIteams.style.maxHeight == "0px") {
        MenuIteams.style.maxHeight = "200px"
    } else {
        MenuIteams.style.maxHeight = "0px"
    }

}
</script>

<!--JS for toggle menu ends-->

<?php
    include 'layout/footer.php';
?>
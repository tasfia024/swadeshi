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

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!Session::get('userId')) {
            echo "<script>window.location = 'sign_in.php'; </script>";
            exit;
        }

        $actionMsg = $homePage->addToCart($productId, $_POST);
    }
?>

<!-- Single product details start-->

<div class="small-container single-product">
    <?php
        if(isset($actionMsg)){
            echo $actionMsg;
        }
    ?>

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

            <form class="needs-validation" action="" method="post">
                <div class="py-2">
                    Quantity:
                    <input type="number" id="qty" name="qty" max="5" min="1" value="1"
                        style="width: 100px; border: 1px solid #ddd; height: 45px;">
                </div>
                <br>
                <!--Cart-->
                <button name="add_to_cart" class="btn btn-primary btn-sm" type="submit">Add To Cart</button>
            </form>
            <!--Product details-->
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
const qtyInput = document.getElementById("qty");

qtyInput.addEventListener("input", function() {
    let value = parseInt(this.value);
    const min = parseInt(this.min);
    const max = parseInt(this.max);

    if (value > max) {
        this.value = max;
    } else if (value < min) {
        this.value = min;
    }
});
</script>

<!--JS for toggle menu ends-->

<?php
    include 'layout/footer.php';
?>